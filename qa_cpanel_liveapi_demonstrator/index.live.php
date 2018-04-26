<?php
    require_once("/usr/local/cpanel/php/cpanel.php");
    $cpanel = new CPANEL();
    echo $cpanel->header( "cPanel LiveAPI Shell", "qa_cpanel_liveapi_demonstrator" );
    if( !empty($_POST) ) {
        try {
        // Do the call
        $api_func = ( $_POST['api_ver'] == 3 ? "uapi" : "api" . $_POST['api_ver'] );
        $api_args = array_filter( $_POST, function($key) {
            if( in_array( $key, [ 'key2add', 'val2add', 'api_ver', 'module', 'function' ] ) ) return false;
            return true;
        }, ARRAY_FILTER_USE_KEY );
        $call_output = $cpanel->$api_func( $_POST['module'], $_POST['function'], $api_args );
        } catch( Exception $ex ) {
            $call_output = $ex->getMessage();
        }
    }
?>
<div class="body-content">
    <form action="index.live.php" method="POST">
        <h2>Call Constructor</h2>
        <div class="input-group">
            <label class="input-group-addon" for="api_ver">cPanel API Version</label>
            <select class="form-control" name="api_ver" id="api_ver">
                <option value=3 selected>UAPI</option>
                <option value=2>cPAPI2</option>'
                <option value=1>cPAPI1</option>
            </select>
        </div>
        <div class="input-group">
            <label class="input-group-addon" for="module">Module</label>
            <input class="form-control" name="module" id="module" type="text" placeholder="Foobar"></input>
        </div>
        <div class="input-group">
            <label class="input-group-addon" for="function">Function</label>
            <input class="form-control" name="function" id="function" type="text" placeholder="baz"></input>
        </div>
        <div class="input-group">
            <label class="input-group-addon" for="key2add">Key</label>
            <input class="form-control" name="key2add" id="key2add" placeholder="nugs"></input>
            <label class="input-group-addon" for="val2add">Value</label>
            <input class="form-control" name="val2add" id="val2add" placeholder="420"></input>
            <span class="input-group-btn">
                <button class="btn btn-default" id="add_arg"><span class="glyphicon glyphicon-plus"></span></button>
            </span>
        </div>
        <h5>Current Arguments:</h5>
        <div id="args" class="well">
        </div>
        <input class="btn btn-primary" type="submit" value="MAXIMUM GO"></input>
    </form>
    <hr />
    <h2>Call Output</h2>
    <pre id="output">
        <?php
            if(empty($call_output)) {
                echo "Please construct the API call above and click 'MAXIMUM GO' to see output here.";
            } else {
                var_dump($call_output);
            }
        ?>
    </pre>
</div>
<script type="text/javascript" src="js/index.js"></script>
<?php
    print $cpanel->footer( "cPanel LiveAPI Shell" );
    $cpanel->end();
?>
