    <?php

    include 'functions.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
            function validateFile() {
                var csvInputFile = document.forms["frmCSVImport"]["file"].value;
                if (csvInputFile == "") {
                    error = "No source found to import. Please choose a CSV file. ";
                    $("#response").html(error).addClass("error");;
                    return false;
                }
                return true;
            }
        </script>
    </head>

    <body>
        <br><br>
        <div id="wrap">
            <!--- upload form -->
            <div class="container">               
                <div class="row">
                    <form class="form-horizontal" action="functions.php" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data" onsubmit="return validateFile()">
                        <fieldset>
                            <!-- Form Name -->

                            <!-- File Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="filebutton">Select File</label>

                                <div class="col-md-4">
                                    <input type="file" name="file" id="file" class="input-large file" accept=".csv,.xls,.xlsx" required>
                                </div>
                    </form>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                    <div class="col-md-4">
                        <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
                    </div>
                </div>
                </fieldset>
                </form>
            </div>
            <!-- create form -->
            <div class="container">
                <form action="/create.php" method="post" enctype="multipart/form-data">

                    <h4 class="display-4 text-center">Create</h4>
                    <hr><br>

                    <div class="form-group">
                        <label for="firstName">firstName</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter firstName">
                    </div>
                    <div class="form-group">
                        <label for="lastName">lastName</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter lastName">
                    </div>

                    <div class="form-group">
                        <label for="contact">contact</label>
                        <input type="number" class="form-control" id="contact" name="contact" placeholder="Enter contact">
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Create</button>
                </form>
            </div>
            <br><br>

            <?php
            get_all_records();
            ?>
        </div>
        </div>
    </body>

    </html>