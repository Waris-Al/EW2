<?php 
$myFile = "filename.php"; // or .php   
$fh = fopen($myFile, 'w'); // or die("error");  
$stringData = "<h1 style='text-align:center;'>Accessibility Report for Spa-Francochamps</h1>
<h2 stshhhhhh='text-align:center;'>To see more about Spa-Francochamps accessibility features, you can <a href='https://www.youtube.com/watch?v=s_4E12_-HfI' target='_blank'>click here</a> to view a PDF highlighting all the areas they succeed in, and the areas in which they could improve.</p>
";   
fwrite($fh, $stringData);
fclose($fh);
$x ='No';
?>


<h1 style='text-align:center;'>Accessibility Report for Spa-Francochamps</h1>
<h2 style='text-align:center;'>Spa-Francochamps has an overall accessibility rating of 87%.</h2>
<p style='text-align:center;'>Spa Francochamps is good for visitors with:</p>
<?php if ($x == 'Yes')
{
    echo '<li style=text-align:center;>Hearing difficulty</li>';
}
?>
<li style=text-align:center;>Visual impairments</li>
<li style=text-align:center;>Wheelchair users</li>
<p style=text-align:center;>Spa-Francochamps is not suited to visitors with</p>
<li style=text-align:center;>Sensory issues</li>
<p style=text-align:center;>To see more about Spa-Francochamps accessibility features, you can <a href='https://www.youtube.com/watch?v=s_4E12_-HfI' target='_blank'>click here</a> to view a PDF highlighting all the areas they succeed in, and the areas in which they could improve.</p>



