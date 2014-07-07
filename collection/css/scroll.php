<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="GallerySoft.info" />

	<title>Untitled 1</title>

    <style>
        .div-top {
            z-index: 10;
            background: white;
            width: 184px;
            position: relative;
        }
        .dv2 {
            border: 1px solid #ddd;
            height: 200px;
            width: 200px;
            overflow: auto;
            margin-top: -27px;
            z-index: 1;
        }
        table td{
            border: 1px solid red;
            padding: 3px;
        }
        .space {
            height: 27px;
        }
    </style>
</head>

<body>

    <div class="dv1">
        <div class="div-top">
            <table>
                <tbody>
                    <tr>
                        <td>CL1</td>
                        <td>CL2</td>
                        <td>CL3</td>
                        <td>CL4</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="dv2">
            <div class="space"></div>
            <table>
                <tbody>
                <?php for($i=0; $i<10; $i++): ?>
                    <tr>
                        <td>CL1</td>
                        <td>CL2</td>
                        <td>CL3</td>
                        <td>CL4</td>
                    </tr>
                <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
  

</body>
</html>