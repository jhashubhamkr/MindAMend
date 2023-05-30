<?php

session_start();
$errors = [];
$form_data = [];
if (isset($_SESSION['form_errors'])) {
    $errors = $_SESSION['form_errors'];
    unset($_SESSION['form_errors']);
}
if (isset($_SESSION['form_data'])) {
    $form_data = $_SESSION['form_data'];
    unset($_SESSION['form_data']);
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
    <form action="./scripts/PostRequestHandler.php" method="POST" name="inventory">
        <section class="calculator">
            <table class="inventory">
                <thead>
                    <tr>
                        <th colspan="2">Enter all the details for Inventory</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <label for="annual_revenue"> Annual Revenue (₹):</label>
                        </th>
                        <td>
                            <input type="number" step="any" id="annual_revenue" name="annual_revenue" placeholder="0.0" value="<?php if(array_key_exists('annual_revenue',$form_data)) {echo $form_data['annual_revenue'];}?>" required />
                            <?php
                                if (array_key_exists('annual_revenue',$errors)) {
                            ?>
                                <div class="error">
                                    <?php echo $errors['annual_revenue'] ?>
                                </div>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="gross_margin">Gross Margin (%):</label>
                        </th>
                        <td>
                            <input type="number" step="any" id="gross_margin" name="gross_margin" placeholder="0.0" value="<?php if(array_key_exists('gross_margin',$form_data)) {echo $form_data['gross_margin'];}?>" required />
                            <?php
                                if (array_key_exists('gross_margin',$errors)) {
                            ?>
                                <div class="error">
                                    <?php echo $errors['gross_margin'] ?>
                                </div>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="bank_interest_p_a">Bank Interest P.A. (%):</label>
                        </th>
                        <td>
                            <input type="number" step="any" id="bank_interest_p_a" name="bank_interest_p_a" placeholder="0.0" value="<?php if(array_key_exists('bank_interest_p_a',$form_data)) {echo $form_data['bank_interest_p_a'];}?>" required />
                            <?php
                                if (array_key_exists('bank_interest_p_a',$errors)) {
                            ?>
                                <div class="error">
                                    <?php echo $errors['bank_interest_p_a'] ?>
                                </div>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="avg_inventory_in_hand">Avg. Inventory In-Hand:</label>
                        </th>
                        <td>
                            <input type="number" step="any" id="avg_inventory_in_hand" name="avg_inventory_in_hand" placeholder="0.0" value="<?php if(array_key_exists('avg_inventory_in_hand',$form_data)) {echo $form_data['avg_inventory_in_hand'];}?>" required />
                            <?php
                                if (array_key_exists('avg_inventory_in_hand',$errors)) {
                            ?>
                                <div class="error">
                                    <?php echo $errors['avg_inventory_in_hand'] ?>
                                </div>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="existing_pilferage">Existing Pilferage (%):</label>
                        </th>
                        <td>
                            <input type="number" step="any" id="existing_pilferage" name="existing_pilferage" placeholder="0.0" value="<?php if(array_key_exists('existing_pilferage',$form_data)) {echo $form_data['existing_pilferage'];}?>" required />
                            <?php
                                if (array_key_exists('existing_pilferage',$errors)) {
                            ?>
                                <div class="error">
                                    <?php echo $errors['existing_pilferage'] ?>
                                </div>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="staff-increment">
                <thead>
                    <tr>
                        <th colspan="2">Enter all the details for Staff Productivity Increment</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <label for="no_of_employees">No. Of Employees:</label>
                        </th>
                        <td>
                            <input type="number" step="any" id="no_of_employees" name="no_of_employees" placeholder="0" value="<?php if(array_key_exists('no_of_employees',$form_data)) {echo $form_data['no_of_employees'];}?>" required />
                            <?php
                                if (array_key_exists('no_of_employees',$errors)) {
                            ?>
                                <div class="error">
                                    <?php echo $errors['no_of_employees'] ?>
                                </div>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="average_salary">Average Salary (₹):</label>
                        </th>
                        <td>
                            <input type="number" step="any" id="average_salary" name="average_salary" placeholder="0.0" value="<?php if(array_key_exists('average_salary',$form_data)) {echo $form_data['average_salary'];}?>" required />
                            <?php
                                if (array_key_exists('average_salary',$errors)) {
                            ?>
                                <div class="error">
                                    <?php echo $errors['average_salary'] ?>
                                </div>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="working_hours_per_day">Working Hours per day:</label>
                        </th>
                        <td>
                            <input type="number" step="any" id="working_hours_per_day" name="working_hours_per_day" placeholder="0.0" value="<?php if(array_key_exists('working_hours_per_day',$form_data)) {echo $form_data['working_hours_per_day'];}?>" required />
                            <?php
                                if (array_key_exists('working_hours_per_day',$errors)) {
                            ?>
                                <div class="error">
                                    <?php echo $errors['working_hours_per_day'] ?>
                                </div>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="working_days_per_month">Working days per month:</label>
                        </th>
                        <td>
                            <input type="number" step="any" id="working_days_per_month" name="working_days_per_month" placeholder="0" value="<?php if(array_key_exists('working_days_per_month',$form_data)) {echo $form_data['working_days_per_month'];}?>" required />
                            <?php
                                if (array_key_exists('working_days_per_month',$errors)) {
                            ?>
                                <div class="error">
                                    <?php echo $errors['working_days_per_month'] ?>
                                </div>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="scale">
                <thead>
                    <tr>
                        <th colspan="2">Enter all the details for Scale</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <label for="no_of_stores_today">No of Stores Today:</label>
                        </th>
                        <td>
                            <input type="number" step="any" id="no_of_stores_today" name="no_of_stores_today" placeholder="0" value="<?php if(array_key_exists('no_of_stores_today',$form_data)) {echo $form_data['no_of_stores_today'];}?>" required />
                            <?php
                                if (array_key_exists('no_of_stores_today',$errors)) {
                            ?>
                                <div class="error">
                                    <?php echo $errors['no_of_stores_today'] ?>
                                </div>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="average_sales">Average Sales per store every year (₹):</label>
                        </th>
                        <td>
                            <input type="number" step="any" id="average_sales" name="average_sales" placeholder="0.0" value="<?php if(array_key_exists('average_sales',$form_data)) {echo $form_data['average_sales'];}?>" required />
                            <?php
                                if (array_key_exists('average_sales',$errors)) {
                            ?>
                                <div class="error">
                                    <?php echo $errors['average_sales'] ?>
                                </div>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="vision">Vision to open how many new stores in next 01 year:</label>
                        </th>
                        <td>
                            <input type="number" step="any" id="vision" name="vision" placeholder="0" value="<?php if(array_key_exists('vision',$form_data)) {echo $form_data['vision'];}?>" required />
                            <?php
                                if (array_key_exists('vision',$errors)) {
                            ?>
                                <div class="error">
                                    <?php echo $errors['vision'] ?>
                                </div>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="growth">
                <thead>
                    <tr>
                        <th colspan="2">Enter all the details for growth table</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <label for="our_fees">Our Fees:</label>
                        </th>
                        <td>
                            <input type="number" step="any" id="our_fees" name="our_fees" placeholder="0" value="<?php if(array_key_exists('our_fees',$form_data)) {echo $form_data['our_fees'];}?>" required />
                            <?php
                                if (array_key_exists('our_fees',$errors)) {
                            ?>
                                <div class="error">
                                    <?php echo $errors['our_fees'] ?>
                                </div>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section>
            <div class="submit">
                <button type="submit">
                    Calculate ROI and show Report
                </button>
            </div>
        </section>
    </form>
</body>
</html>