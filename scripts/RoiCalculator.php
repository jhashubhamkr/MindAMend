<?php

class RoiCalculator
{
    const CASH_FLOW_RATE = 0.2;
    const PILFERAGE_REDUCTION_RATE = 0.5;
    const PRODUCTIVITY_INCREASE_HOURS = 1;
    const EXPANSION_COST_RATE = 0.2;

    public function validateFormData($formData)
    {
        $errors = array();

        $fields = array(
            'annual_revenue' => 'Annual Revenue',
            'gross_margin' => 'Gross Margin',
            'bank_interest_p_a' => 'Bank Interest Per Annum',
            'avg_inventory_in_hand' => 'Average Inventory in Hand',
            'existing_pilferage' => 'Existing Pilferage',
            'no_of_employees' => 'Number of Employees',
            'average_salary' => 'Average Salary',
            'working_hours_per_day' => 'Working Hours per Day',
            'working_days_per_month' => 'Working Days per Month',
            'no_of_stores_today' => 'Number of Stores Today',
            'average_sales' => 'Average Sales',
            'vision' => 'Vision',
            'our_fees' => 'Our Fees'
        );

        foreach ($fields as $field => $fieldName) {
            if (!isset($formData[$field]) || empty($formData[$field])) {
                $errors[$field] = $fieldName . " is required.";
            } elseif (!is_numeric($formData[$field])) {
                $errors[$field] = $fieldName . " should be a valid number.";
            } elseif ($formData[$field] <= 0) {
                $errors[$field] = $fieldName . " should be greater than 0.";
            }
        }

        return $errors;
    }

    public function calculate($formData){
        $inventory = [];
        $staff = [];
        $scale = [];
        $growth = [];
        $roi = [];

        $inventory["cash_flow_getting_free"] = $formData['avg_inventory_in_hand'] * self::CASH_FLOW_RATE;
        $inventory["cogs"] = ($formData['annual_revenue']) * ((100 - $formData['gross_margin']) / 100);
        $inventory["stock_turnover_ratio"] = round($inventory["cogs"] / ($formData['avg_inventory_in_hand'] - $inventory["cash_flow_getting_free"]), 1);
        $inventory["interest_cost_saving"] = $inventory["cash_flow_getting_free"] * ($formData['bank_interest_p_a'] / 100);
        $inventory["existing_pilferage_amount"] = $formData['avg_inventory_in_hand'] * ($formData['existing_pilferage'] / 100);
        $inventory['pilferage_reduction'] = $inventory["existing_pilferage_amount"] * self::PILFERAGE_REDUCTION_RATE;

        $staff['avg_salary_per_h'] = round(($formData['average_salary'] / $formData['working_days_per_month']) / $formData['working_hours_per_day'], 1);
        $staff['total_salary_per_h'] = $staff['avg_salary_per_h'] * $formData['no_of_employees'];
        $staff['saving_per_day'] = $staff['total_salary_per_h'] * self::PRODUCTIVITY_INCREASE_HOURS;
        $staff['monthly_saving'] = $staff['saving_per_day'] * $formData['working_days_per_month'];
        $staff['annual_saving'] = $staff['monthly_saving'] * 12;

        $scale['sale_increase_year'] = $formData['average_sales'] * $formData['vision'];
        $scale['increase'] = $scale['sale_increase_year'] * ($formData['gross_margin'] / 100);
        $scale['increase_in_gross_profit_year'] = $scale['increase'] - ($scale['increase'] * self::EXPANSION_COST_RATE);
        $scale['existing_gross_profits'] = round($formData['average_sales'] * ($formData['gross_margin'] / 100),2);

        $growth['total_net_growth_every_year'] = $scale['increase_in_gross_profit_year'] + $staff['annual_saving'] + $inventory['pilferage_reduction'] + $inventory["interest_cost_saving"];
        $growth['percent_of_net_growth'] = round(($formData['our_fees'] / $growth['total_net_growth_every_year']) * 100, 2);
        
        $growth['profit_increase_by'] = round((($scale['increase_in_gross_profit_year'] - $scale['existing_gross_profits']) / $scale['existing_gross_profits']) * 100, 2);
        $growth['cost_saving'] = round((($staff['annual_saving'] + $inventory["interest_cost_saving"] + $inventory['pilferage_reduction']) / $formData['average_sales']) * 100, 2);
        $growth['total_net_growth_every_year'] = round((($scale['sale_increase_year'] - $formData['average_sales']) / $formData['average_sales']) * 100, 2);

        $roi['our_fees'] = $formData['our_fees'];
        $roi['existing_annual_sales'] = round(($formData['our_fees'] / $formData['average_sales']) * 100, 2);
        $roi['growth_annual_sales'] = round(($formData['our_fees'] / $scale['sale_increase_year']) * 100, 2);
        
        // echo "<pre>";
        // print_r();
        // echo "</pre>";
        return [
            "inventory" => $inventory,
            "staff" => $staff,
            "scale" => $scale,
            "growth" => $growth,
            "roi" => $roi
        ];
    }
}