<?php $test = '';


if ($_POST['search1'] == "cinema")
{
    $test = 'cinema baby';
}
?>



<body>
    <div class="container">
    <h2 class="mb-3">Search Filters popopopopop</h2>
    <br/><br/>
    
    <form class="form-vertical" method="POST">
    <div class="column">
        <div class="form-group">
<?php 
/*
            <label class="control-label col-sm-4" for="email"><b>Search with keywords:</b>:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="search" placeholder="search here">
            </div>
*/

?>
            <br/>

            <div class="col-md-4">
              <label for="Business-type">Business Type</label>
              <select class="form-select" name="search1">
                <option value="">All</option>
                <option value="restaurant">Restaurant</option>
                <option value="General">General</option>
                <option value="cinema">Cinema</option>
                <option value="gym">Gym</option>
              </select>
            </div>


            <div class="col-md-4">
              <label for="disability-type">Needs</label>
              <select class="form-select" name="search2">
                <option value="">All</option>
                <option value="hearing">Hearing</option>
                <option value="wchair">Wheel Chair</option>
                <option value="parking">Parking</option>
              </select>

              </div>
            <div class="col-sm-2">
              <button type="submit" name="save" class="btn btn-success btn-sm">Submit</button>
            </div>
        </div>
         
    </div>
    </form>
    <br/><br/>


    <?php echo "test is " . $test; ?>


