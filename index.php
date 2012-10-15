<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>HipsterJesus - A Hipster Ipsum API</title>
	<link rel="stylesheet" href="/assets/css/gs.css" type="text/css" media="screen">
	<link rel="stylesheet" href="/assets/css/style.css" type="text/css" media="screen">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="/assets/js/params.plugin.js"></script>
    <script src="/assets/js/main.js"></script>
    <meta name="author" content="Ian Van Ness"/>
</head>
<body>
	<div class="container_12">
        <div class="grid_12">
            <h1>HipsterJesus / API docs</h1>
            
            <div id="params">
                <code>
                endpoint: http://hipsterjesus.com/api/<br/>
                parameters: <br/>
                <form id="params_form">
                paras = [1 - 99] (default 4) : <input type="text" id="paras" name="paras" value="4" maxlength="2"><br/>
                type = ['hipster-latin', 'hipster-centric'] (default 'hipster-latin') :
                <select name="type" id="type" size="1">
                    <option value="hipster-latin">hipster-latin</option>
                    <option value="hipster-centric">hipster-centric</option>
                </select>
                <br/>
                html = ['true', 'false'] ( default 'true') - strips html from output, replaces p tags with newlines :
                <select name="html" id="html" size="1">
                    <option value="true">true</option>
                    <option value="false">false</option>
                </select>
                
                <br/>
                </form>
                </code>
                <br/><br/>
                Super special thanks to <a href="http://hipsteripsum.me/">hipsteripsum.me</a> (hi jason!)<br/><br/>
                <a href="http://sethlilly.com/">Seth Lilly</a> created a fabulous <a href="https://github.com/sethlilly/Hipster-Ipsum-for-Coda">Hipster Ipsum for Coda (versions 1 and 2!)</a> plugin!<br/>
                <br/>
                Example via jQuery:
                <pre class="codeblock">
    $.getJSON('http://hipsterjesus.com/api/', function(data) {
        $('#content').html( data.text );
    });
                </pre>
            </div>


            <div id="content">
                <img src="/assets/images/ajax_spinner.gif" alt="working..."/>
            </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    $.getJSON('http://hipsterjesus.com/api/', function(data) {
                        $('#content').html( data.text );
                    });
                });
            </script>
            
            
        </div> <!-- grid_12 -->
    </div><!-- container_12 -->
    <div class="clear"></div>
    <div class="container_12">
        <div class="grid_2 prefix_5 suffix_5 small">
            <?php print date('Y'); ?> <a href="http://ianvanness.com/">ian van ness</a>
        </div>
    </div>
</body>
</html>
