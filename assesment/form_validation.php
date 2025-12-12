<!DOCTYPE html>
<html>
<body>

<?php

function showResult($formName, $isValid, $value = '', $errors = []) {
    $color = $isValid ? 'green' : 'red';
    echo "<p style='color:$color;'><strong>$formName:</strong> ";
    if ($isValid) {
        echo "VALID - " . htmlspecialchars($value);
    } else {
        echo "INVALID";
        if (!empty($errors)) {
            echo " (" . implode(", ", $errors) . ")";
        }
    }
    echo "</p>";
}
?>


<h3>1. Name</h3>
<form method="POST">
    NAME <input type="text" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
    <input type="submit" name="submit_name" value="Submit">
</form>

<?php
if (isset($_POST['submit_name'])) {
    $name = trim($_POST['name']);
    $errors = [];
    $isValid = true;
    
    if (empty($name)) {
        $errors[] = "Cannot be empty";
        $isValid = false;
    }
    
    if ($isValid && str_word_count($name) < 2) {
        $errors[] = "Must contain at least two words";
        $isValid = false;
    }
    
    if ($isValid && !preg_match('/^[a-zA-Z]/', $name)) {
        $errors[] = "Must start with a letter";
        $isValid = false;
    }
    
    if ($isValid && !preg_match('/^[a-zA-Z\s\.\-]+$/', $name)) {
        $errors[] = "Can contain only a-z, A-Z, period, dash";
        $isValid = false;
    }
    
    showResult("NAME", $isValid, $name, $errors);
}
?>

<hr>


<h3>2. Email</h3>
<form method="POST">
    EMAIL <input type="text" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
    <input type="submit" name="submit_email" value="Submit">
</form>

<?php
if (isset($_POST['submit_email'])) {
    $email = trim($_POST['email']);
    $errors = [];
    $isValid = true;
    
    if (empty($email)) {
        $errors[] = "Cannot be empty";
        $isValid = false;
    }
    
    if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Must be a valid email address";
        $isValid = false;
    }
    
    showResult("EMAIL", $isValid, $email, $errors);
}
?>

<hr>


<h3>3. Date of Birth</h3>
<form method="POST">
    DATE OF BIRTH 
    <input type="text" name="dd" size="2" placeholder="dd" value="<?php echo isset($_POST['dd']) ? htmlspecialchars($_POST['dd']) : ''; ?>"> /
    <input type="text" name="mm" size="2" placeholder="mm" value="<?php echo isset($_POST['mm']) ? htmlspecialchars($_POST['mm']) : ''; ?>"> /
    <input type="text" name="yyyy" size="4" placeholder="yyyy" value="<?php echo isset($_POST['yyyy']) ? htmlspecialchars($_POST['yyyy']) : ''; ?>">
    <input type="submit" name="submit_dob" value="Submit">
</form>

<?php
if (isset($_POST['submit_dob'])) {
    $dd = trim($_POST['dd']);
    $mm = trim($_POST['mm']);
    $yyyy = trim($_POST['yyyy']);
    $errors = [];
    $isValid = true;
    
    if (empty($dd) || empty($mm) || empty($yyyy)) {
        $errors[] = "Cannot be empty";
        $isValid = false;
    }
    
    if ($isValid) {
        if (!is_numeric($dd) || $dd < 1 || $dd > 31) {
            $errors[] = "dd must be 1-31";
            $isValid = false;
        }
        if (!is_numeric($mm) || $mm < 1 || $mm > 12) {
            $errors[] = "mm must be 1-12";
            $isValid = false;
        }
        if (!is_numeric($yyyy) || $yyyy < 1953 || $yyyy > 1998) {
            $errors[] = "yyyy must be 1953-1998";
            $isValid = false;
        }
        
        if ($isValid && !checkdate($mm, $dd, $yyyy)) {
            $errors[] = "Invalid date";
            $isValid = false;
        }
    }
    
    $dobValue = $dd . '/' . $mm . '/' . $yyyy;
    showResult("DATE OF BIRTH", $isValid, $dobValue, $errors);
}
?>

<hr>


<h3>4. Gender</h3>
<form method="POST">
    <input type="radio" name="gender" value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Male') ? 'checked' : ''; ?>> Male<br>
    <input type="radio" name="gender" value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Female') ? 'checked' : ''; ?>> Female<br>
    <input type="radio" name="gender" value="Other" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Other') ? 'checked' : ''; ?>> Other<br>
    <input type="submit" name="submit_gender" value="Submit">
</form>

<?php
if (isset($_POST['submit_gender'])) {
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $errors = [];
    $isValid = true;
    
    if (empty($gender)) {
        $errors[] = "At least one must be selected";
        $isValid = false;
    }
    
    showResult("GENDER", $isValid, $gender, $errors);
}
?>

<hr>


<h3>5. Degree</h3>
<form method="POST">
    <input type="checkbox" name="degrees[]" value="SSC" <?php echo (isset($_POST['degrees']) && in_array('SSC', $_POST['degrees'])) ? 'checked' : ''; ?>> SSC<br>
    <input type="checkbox" name="degrees[]" value="HSC" <?php echo (isset($_POST['degrees']) && in_array('HSC', $_POST['degrees'])) ? 'checked' : ''; ?>> HSC<br>
    <input type="checkbox" name="degrees[]" value="BSc" <?php echo (isset($_POST['degrees']) && in_array('BSc', $_POST['degrees'])) ? 'checked' : ''; ?>> BSc<br>
    <input type="checkbox" name="degrees[]" value="MSc" <?php echo (isset($_POST['degrees']) && in_array('MSc', $_POST['degrees'])) ? 'checked' : ''; ?>> MSc<br>
    <input type="submit" name="submit_degree" value="Submit">
</form>

<?php
if (isset($_POST['submit_degree'])) {
    $degrees = isset($_POST['degrees']) ? $_POST['degrees'] : [];
    $errors = [];
    $isValid = true;
    
    if (count($degrees) < 2) {
        $errors[] = "At least two must be selected";
        $isValid = false;
    }
    
    $degreesValue = implode(", ", $degrees);
    showResult("DEGREE", $isValid, $degreesValue, $errors);
}
?>

<hr>

<h3>6. Blood Group</h3>
<form method="POST">
    <select name="blood_group">
        <option value="">Select</option>
        <option value="A+" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] == 'A+') ? 'selected' : ''; ?>>A+</option>
        <option value="A-" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] == 'A-') ? 'selected' : ''; ?>>A-</option>
        <option value="B+" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] == 'B+') ? 'selected' : ''; ?>>B+</option>
        <option value="B-" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] == 'B-') ? 'selected' : ''; ?>>B-</option>
        <option value="AB+" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] == 'AB+') ? 'selected' : ''; ?>>AB+</option>
        <option value="AB-" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] == 'AB-') ? 'selected' : ''; ?>>AB-</option>
        <option value="O+" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] == 'O+') ? 'selected' : ''; ?>>O+</option>
        <option value="O-" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] == 'O-') ? 'selected' : ''; ?>>O-</option>
    </select>
    <input type="submit" name="submit_blood" value="Submit">
</form>

<?php
if (isset($_POST['submit_blood'])) {
    $blood_group = isset($_POST['blood_group']) ? $_POST['blood_group'] : '';
    $errors = [];
    $isValid = true;
    
    if (empty($blood_group)) {
        $errors[] = "Must be selected";
        $isValid = false;
    }
    
    showResult("BLOOD GROUP", $isValid, $blood_group, $errors);
}
?>

</body>
</html>