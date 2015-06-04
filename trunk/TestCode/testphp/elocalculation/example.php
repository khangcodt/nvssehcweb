<?php

require_once ('elo-calculator.php');

if (!empty($_POST['S1']) OR !empty($_POST['S2']) OR !empty($_POST['R1']) OR !empty($_POST['R2'])) {
// $elo_calculator = new elo_calculator();
    $results = rating($_POST['S1'], $_POST['S2'], $_POST['R1'], $_POST['R2']);
    $R = $results;
}
?>
fdsafdsaf
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table>
        <tr>
            <td>&nbsp;</td>
            <td>Player 1</td>
            <td>Player 2</td>
        </tr>
        <tr>
            <td>Points:</td>
            <td><input type="text" size="5" name="R1" value="<?php if (!empty($R['R1'])) {
                    echo $R['R1'];
                }; ?>"/></td>
            <td><input type="text" name="R2" size="5" value="<?php if (!empty($R['R2'])) {
                    echo $R['R2'];
                }; ?>"/></td>
        </tr>
        <tr>
            <td>Match Results:</td>
            <td><input type="text" name="S1" size="5" value="<?php if (!empty($R['S1'])) {
                    echo $R['S1'];
                }; ?>"/></td>
            <td><input type="text" name="S2" size="5" value="<?php if (!empty($R['S2'])) {
                    echo $R['S2'];
                }; ?>"/></td>
        </tr>
        <tr>
            <td>Points gained/lost:</td>
            <td><?php if (!empty($R['P1'])) {
                    echo $R['P1'];
                }; ?></td>
            <td><?php if (!empty($R['P2'])) {
                    echo $R['P2'];
                }; ?></td>
        </tr>
        <tr>
            <td>Final results:</td>
            <td><input type="text" size="5" name="" value="<?php if (!empty($R['R3'])) {
                    echo $R['R3'];
                }; ?>"/></td>
            <td><input type="text" size="5" name="" value="<?php if (!empty($R['R4'])) {
                    echo $R['R4'];
                }; ?>"/></td>
        <tr>
            <td>&nbsp;</td>
            <td colspan="2">
                <input type="submit" value="Calculate"/></td>
        </tr>
    </table>
</form>