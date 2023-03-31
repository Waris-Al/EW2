<h1 style='text-align:center;'>Accessibility Report for Access For All Group Three</h1>
<h2 style='text-align:center;'>Access For All Group Three has an overall accessibility rating of 87%.</h2>
<p style='text-align:center;'>Access For All Group Three is good for visitors with:</p>
<?php 
	echo '<li style=text-align:center;>Wheelchair users</li>';
	echo '<li style=text-align:center;>Visual impairments</li>';
	echo '';


  if ('<li style=text-align:center;>Wheelchair users</li>' == '' || '<li style=text-align:center;>Visual impairments</li>' == '' || '' == '')
  {
    echo '<p style=text-align:center;>Access For All Group Three is not suited to visitors with</p>';
    if ('<li style=text-align:center;>Wheelchair users</li>' == '')
    {
      echo '<li style=text-align:center;>Wheelchair users</li>';
    }
    if ('<li style=text-align:center;>Visual impairments</li>' == '')
    {
      echo '<li style=text-align:center;>Visual impairments</li>';
    }
    if ('' == '')
    {
      echo '<li style=text-align:center;>Hearing difficulty</li>';
    }
  }
?>

<p style='text-align:center;'>To see more about Access For All Group Three accessibility features, you can <a href='https://everyonewelcome2.azurewebsites.net/Access For All Group Three.pdf' target='_blank'>click here</a> to view a PDF highlighting all the areas they succeed in, and the areas in which they could improve.</p>
