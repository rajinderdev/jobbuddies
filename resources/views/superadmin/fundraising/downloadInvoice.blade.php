<!DOCTYPE html>
<html lang="en">
<head>
<title>Download ticket</title>
<meta charset="UTF-8">
<meta name="description" content="Download ticket">
<meta name="keywords" content="Download ticket">
<meta name="author" content="Super School">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    body {
        margin: 0px;
        padding: 0px;
    }
    table {
        margin: 0 auto; 
        width: 500px; 
        border: 1px solid #ccc;
        border-collapse: collapse;
    }
    table thead th {
        font-size: 26px;
        background: #39afc7;
        color: #fff;
    }
    table thead th,
    table tbody td{
        border: 1px solid #ccc;
        padding: 10px 15px;
        font-family: 'Poppins', sans-serif !important;
    }
    table tbody td img{
        max-width: 300px;
        margin: 20px auto;
        display: block;
    }
    table tbody tr:nth-child(even) td{
        background: #f9f9f9;
    }
    table tfoot td{
        padding: 15px;
    }
    table tfoot td img{
        max-width: 130px;
        margin: 0 auto;
        display: block;
        text-align: center;
    }
    body .headline {
        font-size: 30px;
        font-family: 'Poppins', sans-serif !important;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
   
	<div style="width:100%; display: table; padding-bottom: 20px;">
		<div style="width: 100%; display: table-cell; text-align: right; padding:10px 30px 0 0;"><img src="https://superschool.org/wp-content/uploads/2023/02/Super_School_Logo-1.png" width="100"></div>
		<div style="width: 100%; display: table-cell;">
			<h3 style="margin:0px;">SUPER SCHOOL</h3>
			<p style="margin:0px;"><i>Masked Perfection</i></p>
			<p style="margin:0px;">4343 W Sunrise Blvd</p>
			<p style="margin:0px;">Plantation, FL 33313</p>
		</div>
	</div>
    <div class="headline mb-4"  style="text-align:center;"><strong>Donation Invoice Detail</strong></div>
    <table class="table table-bordered">
        <tbody>
          <tr>
            <tr>
              <td><strong>Transaction ID</strong></td>
              <td>{{ ($donation)?$donation->transection_id:'' }}</td>
            </tr>
            <td><strong>Donation Amount</strong></td>
            <td>${{ ($donation)?$donation->amount:'' }}</td>
          </tr>
          <tr>
            <td><strong>Donation Date</strong></td>
            <td>{{ ($donation)?$donation->created_at->format('d-M-Y'):'' }}</td>
          </tr>
          <tr>
            <td><strong>Dedication Type</strong></td>
            <td>{{ ($donation && $donation->donation_status!="Public")?$donation->donate_type:'' }}</td>
          </tr>
        
          <tr>
            <td><strong>Dedicatee Name</strong></td>
            <td>{{ ($donation && $donation->donation_status!="Public")?$donation->dedicatees_name:'Anonymous' }}</td>
          </tr>
          <tr>
            <td><strong>Dedicatee Email</strong></td>
            <td>{{ ($donation && $donation->donation_status!="Public")?$donation->dedicatees_email:'' }}</td>
          </tr>
          <tr>
            <td><strong>Recipient Email</strong></td>
            <td>{{ ($donation)?$donation->recipient_email:'' }}</td>
          </tr>
          <tr>
            <td><strong>Status</strong></td>
            <td>Success</td>
          </tr>
        </tbody>
      </table>
 </body>
</html>