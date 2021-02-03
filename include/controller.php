<?php
global $client;
include_once("modules/client/function.php");
$client = new ClientModel();


global $payment;
include_once("modules/payment/function.php");
$payment = new PaymentModel();

global $meter;
include_once("modules/meter/function.php");
$meter = new MeterModel();

global $reports;
include_once("modules/reports/function.php");
$reports = new ReportsModel();

global $new_charge;
include_once("modules/new_charge/function.php");
$new_charge = new NewChargeModel();


global $replace_charge;
include_once("modules/replace_charge/function.php");
$replace_charge = new ReplaceChargeModel();



global $ownership_transfer;
include_once("modules/ownership_transfer/function.php");
$ownership_transfer = new OwnerModel();

global $donation;
include_once("modules/donation/function.php");
$donation = new DonationModel();


global $dues;
include_once("modules/dues/function.php");
$dues = new DuesModel();



class Controller
{	
	function doAction()
	{
		global $client;
		global $payment;
		global $meter;
		global $reports;
		global $new_charge;
		global $replace_charge;
		global $donation;
		global $dues;
		global $ownership_transfer;

	switch($_REQUEST['page'])
			{

				case 'client_form':
					if(isset($_POST['name']) && trim($_POST['name']) != '')
					{
						if(trim($_POST['h']) == '')
						{
							$client->insert($_POST);
							
						}
						else
						{
							$client->update($_POST);
						}

						header('Location: index.php?page=client');
						

					}				
					include_once("modules/client/form.php");
					break;

				case 'client':
					if(isset($_GET['del_id']))
					{
						
						$client->delete($_GET['del_id']);	
						header('Location: index.php?page=client&op=delete');
					}
					include_once("modules/client/view.php");
					break;

				case 'payment_form':
					if(isset($_POST['cid']) && trim($_POST['cid']) != '')
					{
						if(trim($_POST['pid']) == '')
						{
							$payment->insert($_POST);	
						}
						else
						{
							$payment->update($_POST);
						}

						header('Location: index.php?page=payment');
						
					}				
					include_once("modules/payment/form.php");
					break;

				

				case 'payment':
					if(isset($_GET['del_id']))
					{
						
						$payment->delete($_GET['del_id']);						
						header('Location: index.php?page=payment&op=delete');
					}
					include_once("modules/payment/view.php");
					break;

				case 'payment_history':
					if(isset($_GET['history_id'])){
						include_once("modules/payment/history.php");
					}

					break;


				case 'meter':
					if(isset($_GET['del_id']))
					{						
						$meter->delete($_GET['del_id']);						
						header('Location: index.php?page=meter&op=delete');
					}
					include_once("modules/meter/view.php");
					break;

				
				case 'meter_form':
					if(isset($_POST['cid']) && trim($_POST['cid']) != '')
					{
						if(trim($_POST['mid']) == '')
						{
							$meter->insert($_POST);		
						}

						header('Location: index.php?page=meter');
						
					}				
					include_once("modules/meter/form.php");
					break;

					
				case 'meter_update':
					if(isset($_POST['mid']) && trim($_POST['mid']) != '')
					{
						$meter->update($_POST);		
						header('Location: index.php?page=meter&op=update');					
					}
					include_once("modules/meter/update_form.php");
					break;


				case 'reports':
					
					if($_GET['reports']=='monthly') {						
						header('Location: index.php?page=reports_form&reports=monthly');	
					}

					include_once("modules/reports/view.php");
					break;

				
				case 'reports_form':
									
					include_once("modules/reports/form.php");
					break;


				case 'new_charge_form':
					if(isset($_POST['cust_name']) && trim($_POST['cust_name']) != '')
					{

						if(trim($_POST['id']) == '')
						{
							$new_charge->insert($_POST);					
						}
						else
						{
							$new_charge->update($_POST);
						}

						header('Location: index.php?page=new_charge');
						

					}				
					include_once("modules/new_charge/form.php");
					break;

				case 'new_charge':
					if(isset($_GET['del_id']))
					{
						
						$new_charge->delete($_GET['del_id']);	
						header('Location: index.php?page=new_charge&op=delete');
					}
					include_once("modules/new_charge/view.php");
					break;


				case 'replace_charge_form':
					if(isset($_POST['cust_name']) && trim($_POST['cust_name']) != '')
					{

						if(trim($_POST['id']) == '')
						{
							$replace_charge->insert($_POST);					
						}
						else
						{
							$replace_charge->update($_POST);
						}

						header('Location: index.php?page=replace_charge');
						

					}				
					include_once("modules/replace_charge/form.php");
					break;

				case 'replace_charge':
					if(isset($_GET['del_id']))
					{
						
						$replace_charge->delete($_GET['del_id']);	
						header('Location: index.php?page=replace_charge&op=delete');
					}
					include_once("modules/replace_charge/view.php");
					break;

				case 'donation_form':
					if(isset($_POST['name']) && trim($_POST['name']) != '')
					{

						if(trim($_POST['id']) == '')
						{
							$donation->insert($_POST);					
						}
						else
						{
							$donation->update($_POST);
						}

						header('Location: index.php?page=donation');
						

					}				
					include_once("modules/donation/form.php");
					break;

				case 'donation':
					if(isset($_GET['del_id']))
					{
						
						$donation->delete($_GET['del_id']);	
						header('Location: index.php?page=donation&op=delete');
					}
					include_once("modules/donation/view.php");
					break;




				case 'ownership_transfer_form':
					if(isset($_POST['new_owner']) && trim($_POST['new_owner']) != '')
					{

						if(trim($_POST['id']) == '')
						{
							$ownership_transfer->insert($_POST);					
						}
						else
						{
							$ownership_transfer->update($_POST);
						}

						header('Location: index.php?page=ownership_transfer');
						

					}				
					include_once("modules/ownership_transfer/form.php");
					break;

				case 'ownership_transfer':
					if(isset($_GET['del_id']))
					{
						
						$ownership_transfer->delete($_GET['del_id']);	
						header('Location: index.php?page=ownership_transfer&op=delete');
					}
					include_once("modules/ownership_transfer/view.php");
					break;



				case 'dues_form':
					if(isset($_POST['cid']) && trim($_POST['cid']) != '')
					{

						if(trim($_POST['id']) == '')
						{
							$dues->insert($_POST);					
						}

						header('Location: index.php?page=dues');
						

					}				
					include_once("modules/dues/form.php");
					break;

				case 'dues':
					if(isset($_GET['del_id']))
					{
						
						$dues->delete($_GET['del_id']);	
						header('Location: index.php?page=dues&op=delete');
					}
					include_once("modules/dues/view.php");
					break;


		
				case 'dues_update':
					if(isset($_POST['id']) && trim($_POST['id']) != '')
					{
						$dues->update($_POST);		
						header('Location: index.php?page=dues&op=update');					
					}
					include_once("modules/dues/update_form.php");
					break;




				default:
					include_once("modules/client/view.php");
					break;
			}
	}
	
}

$c = new Controller();
$c->doAction();

?>