<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
        function preventBack(){window.history.forward();}
        setTimeout("preventBack()", 0);
        window.onunload=function(){null};
    </script>
    
    <title>Dukundumurimo company ltd</title>
    <style>
       *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;

       }
       .navbar {
       
    display: flex;
    justify-content: center;
    align-items: center;
    
    background-color: grey;
    height: 70px;
    
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    

       }
         .navbar a{
             gap: 10%;
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
    transition: background-color 0.3s;
     margin-right: 10%;

    
         }
            .navbar a:hover {
    background-color: #ddd;
    color: black;
            }
            .navbar a.active {
    background-color: #4CAF50;
    color: white;
            }
            .navbar a:not(:first-child) {
                border-left: 1px solid #bbb;
            }
            .navbar a:first-child {
                border-left: none;
            }
            .navbar a:last-child {
                border-right: none;
            }
            .navbar a:focus {
                outline: none;
            }
            .navbar a:active {
                background-color: #4CAF50;
                color: white;
            }
            .navbar a:visited {
                color: white;
            }

            .navbar a:link {
                color: white;
            }
            .navbar a:visited {
                color: white;
            }
            .navbar a:focus {
                outline: none;
            }
            .navbar a:active {
                background-color: #4CAF50;
                color: white;
            }
            .navbar a:visited {
                color: white;
            }
            .navbar a:link {
                color: white;
            }
            .navbar a:visited {
                color: white;
            }
            .navbar a:focus {
                outline: none;
            }
            .navbar a:active {
                background-color: #4CAF50;
                color: white;
            }
            .navbar a:visited {
                color: white;
            }
            .navbar a:link {
                color: white;
            }
            .navbar a:visited {
                color: white;
            }
            .navbar a:focus {
                outline: none;
            }
            .navbar a:active {
                background-color: #4CAF50;
                color: white;
            }
            .navbar{
                background-color: grey;
            }
            .duk{
                background-color: #f2f2f2;
                padding: 20px;
                text-align: center;
            }
            .duk h1, .duk h2, .duk h3 {
                margin: 0;
                padding: 10px;
            }
            

    
   
    


    </style>
</head>
<body>
    
       
        <h2 style="text-align: center; color: white;">Food Import and Export Management System</h2>
        <h3 style="text-align: center; color: black;">Welcome to Dukundumurimo Company LTD</h3>
    
    <div class="navbar">
 <p style="text-align: center; color:white; font-size: x-large;  font-family: Georgia, 'Times New Roman', Times, serif;">Dukundumurimo Company LTD</p>
        
 <a href="foodform.php">Foods</a>

        <a href="importform.php">Import</a>
        <a href="exportform.php">Export</a>
        <a href="report.php">Report</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="body">
        
        
        <div class="image">
<img src="image/OIP (3).jpg" class="image"  width="100%"
 height="100%" style="position: absolute; top: 0; left: 0;"

 alt="Image" style="width: 100%; height: 100vh; object-fit: cover;">

        </div>

    </div>
    
<footer>
    <p>&copy; <?php echo date("Y"); ?>Dukundumurimo Company LTD. All rights reserved.</p>
</footer>
<style>
    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px 0;
    }

</style>
</body>
</html>
