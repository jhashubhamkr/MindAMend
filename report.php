<?php
session_start();

$response = [];
if (isset($_SESSION['response'])) {
    $response = $_SESSION['response'];
    unset($_SESSION['response']);
}else {
    header("Location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap">
    <link rel="stylesheet" href="./css/style.css">
    <title>ROI Calculator</title>
</head>
<body>
    <h1>Return on Investment Calculator</h1>
    <section class="calculator report">
        <table class="inventory">
            <thead>
                <tr>
                    <th colspan="2">Inventory</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        Cash Flow Getting Free
                    </th>
                    <td>
                        <?php echo $response['inventory']['cash_flow_getting_free']; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Stock Turnover Ratio
                    </th>
                    <td>
                        <?php echo $response['inventory']['stock_turnover_ratio']; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Interest Cost Saving on Extra Cash Flow
                    </th>
                    <td>
                        <?php echo $response['inventory']['interest_cost_saving']; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Pilferage Reduction
                    </th>
                    <td>
                        <?php echo $response['inventory']['pilferage_reduction']; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="staff-increment">
            <thead>
                <tr>
                    <th colspan="2">Staff Productivity Increment </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        Saving per day
                    </th>
                    <td>
                        <?php echo $response['staff']['saving_per_day']; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Monthly Saving
                    </th>
                    <td>
                        <?php echo $response['staff']['monthly_saving']; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Annual Saving
                    </th>
                    <td>
                        <?php echo $response['staff']['annual_saving']; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="scale">
            <thead>
                <tr>
                    <th colspan="2">Scale</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        Increase in Sales every year
                    </th>
                    <td>
                        <?php echo $response['scale']['sale_increase_year']; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Increase in Gross Profit - every year
                    </th>
                    <td>
                        <?php echo $response['scale']['increase_in_gross_profit_year']; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="growth">
            <thead>
                <tr>
                    <th colspan="2">Growth Opportunity Benefit after 10X Program</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        Profit Increase by
                    </th>
                    <td>
                        <?php echo $response['scale']['increase_in_gross_profit_year']; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Cost Saving by
                    </th>
                    <td>
                        <?php echo $response['staff']['annual_saving'] + $response['inventory']['pilferage_reduction'] + $response['inventory']['interest_cost_saving']; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Total Net Growth Every Year
                    </th>
                    <td>
                        <?php echo $response['growth']['total_net_growth_every_year']; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Our Fees
                    </th>
                    <td>
                        <?php echo $response['roi']['our_fees']; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        % of Net Growth
                    </th>
                    <td>
                        <?php echo $response['growth']['percent_of_net_growth']; ?> %
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="growth-opportunities">
            <thead>
                <tr>
                    <th colspan="2">Growth Opportunity</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        Profit Increase by
                    </th>
                    <td>
                        <?php echo $response['growth']['profit_increase_by']; ?> %
                    </td>
                </tr>
                <tr>
                    <th>
                        Cost Saving by (% of existing sales)
                    </th>
                    <td>
                        <?php echo $response['growth']['cost_saving']; ?> %
                    </td>
                </tr>
                <tr>
                    <th>
                        Total Net Growth Every Year
                    </th>
                    <td>
                        <?php echo $response['growth']['total_net_growth_every_year']; ?> %
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="fees-roi">
            <thead>
                <tr>
                    <th colspan="2">Fees ROI Calculator</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        Our Fees
                    </th>
                    <td>
                        <?php echo $response['roi']['our_fees']; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        % of Existing Annual Sales
                    </th>
                    <td>
                        <?php echo $response['roi']['existing_annual_sales']; ?> %
                    </td>
                </tr>
                <tr>
                    <th>
                        % of Growth Annual Sales
                    </th>
                    <td>
                        <?php echo $response['roi']['growth_annual_sales']; ?> %
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</body>
</html>