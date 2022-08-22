<?php

require_once('easyBackendStyle.php');
require_once('ebs_DatabaseConnector.php');

if (isset($_REQUEST['submit'])) {
    $GLOBALS['backgroundMenuColor'] = $_REQUEST['backgroundMenuColor'];
    $GLOBALS['selectedMenuColor'] = $_REQUEST['selectedMenuColor'];
    $GLOBALS['hoverMenuColor'] = $_REQUEST['hoverMenuColor'];
    $GLOBALS['menuTextColor'] = $_REQUEST['menuTextColor'];
    $GLOBALS['menuTextHoverColor'] = $_REQUEST['menuTextHoverColor'];


    saveColorValueInDB($_REQUEST['backgroundMenuColor'],'backgroundMenuColor');
    saveColorValueInDB($_REQUEST['selectedMenuColor'], 'selectedMenuColor');
    saveColorValueInDB($_REQUEST['hoverMenuColor'], 'hoverMenuColor');
    saveColorValueInDB($_REQUEST['menuTextColor'], 'menuTextColor');
    saveColorValueInDB($_REQUEST['menuTextHoverColor'], 'menuTextHoverColor');

    my_custom_fonts();

    trigger_error("error_msg");
}
?>

<div class="wrap">

    <h1>Settings for EasyBackendStyle Plugin</h1>
    <p class="description">
        This is the settings Page for the EasyBackendStyle Plugin.
    </p>

    <form action="" method="post">

        <table>
            <tbody>
                <tr>
                    <th scope="row"><label for="backgroundMenuColor">backgroundMenuColor</label></th>
                    <td>
                        <input type="color" name="backgroundMenuColor" id="backgroundMenuColor" class="small-text"
                        value="<?php echo getColorValueFromDB("backgroundMenuColor")[0][0];?>">
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="selectedMenuColor">selectedMenuColor</label></th>
                    <td>
                        <input type="color" name="selectedMenuColor" id="selectedMenuColor" class="small-text"
                        value="<?php echo getColorValueFromDB("selectedMenuColor")[0][0]; ?>">
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="hoverMenuColor">hoverMenuColor</label></th>
                    <td>
                        <input type="color" name="hoverMenuColor" id="hoverMenuColor" class="small-text"
                        value="<?php echo getColorValueFromDB("hoverMenuColor")[0][0];?>">
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="menuTextColor">menuTextColor</label></th>
                    <td>
                        <input type="color" name="menuTextColor" id="menuTextColor" class="small-text"
                        value="<?php echo getColorValueFromDB("menuTextColor")[0][0];?>">
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="menuTextHoverColor">menuTextHoverColor</label></th>
                    <td>
                        <input type="color" name="menuTextHoverColor" id="menuTextHoverColor" class="small-text"
                        value="<?php echo getColorValueFromDB("menuTextHoverColor")[0][0];?>">
                    </td>
                </tr>
            </tbody>
        </table>
        
    <?php submit_button( $name = 'Save' ); ?> </form>

</div><!-- .wrap -->

