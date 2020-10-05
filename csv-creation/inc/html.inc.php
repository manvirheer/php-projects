<?php

//header
function html_header($title = "Receipt Generator")
{ ?>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <title><?php echo $title ?> </title>
    </head>

    <body>
        <br />
        <div class="container">
            <div class="row justify-content-center">
                <h1 class="display-4"><?php echo $title ?></h1>
            </div>
            <hr>
        </div>

    <?php }


//form
function html_form()
{ ?>
        <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <input type="file" name="fileToUpload">
                <input type="submit" value="Upload CSV">
            </form>
        </div>
        <br />
    <?php }

//table
function html_table($items)
{ ?>
        <div class="container">
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th scope="col">Item Number</th>
                        <th scope="col">Item Desciption</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($items) - 3; $i++) {
                        echo '<tr>
                        <td scope="col">' . $items[$i][0] . '</td>
                        <td>' . $items[$i][1] . '</td>
                        <td>' . $items[$i][2] . '</td>
                        <td>' . $items[$i][3] . '</td>
                        <td>' . $items[$i][4] . '</td>
                        </tr>';
                    }

                    ?>

                </tbody>
            </table>
            <br />
            <div class="col-sm-8 col-lg-8" style="padding:0">

                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th style="padding:4px" scope="col">Subtotal: <?php echo $items[count($items) - 3] ?></th>
                        </tr>
                        <tr>
                            <th style="padding:4px" scope="col">Taxes: $<?php echo sprintf("%.2f", $items[count($items) - 2]) ?></th>
                        </tr>
                        <tr>
                            <th style="padding:4px" scope="col">Total: $<?php echo sprintf("%.2f", $items[count($items) - 1]) ?></th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
        </div>
    <?php }

function html_showErrors($errors)
{ ?>
        <div class="container">
            <div class="alert alert-danger" role="alert">
                <p>Please fix the following errors:</p>
                <ul>
                    <?php

                    foreach ($errors as $error) {
                        echo "<li>" . $error . "</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    <?php }


//footer
function html_footer()
{ ?>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>

    </html>

<?php }
