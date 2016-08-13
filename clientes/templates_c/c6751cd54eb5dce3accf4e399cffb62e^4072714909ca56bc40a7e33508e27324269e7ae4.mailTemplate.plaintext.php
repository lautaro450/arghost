<?php /* Smarty version Smarty-3.1.21, created on 2016-08-12 17:56:46
         compiled from "mailTemplate:plaintext" */ ?>
<?php /*%%SmartyHeaderCode:62441062957acdb6a3dd9b5-35420348%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4072714909ca56bc40a7e33508e27324269e7ae4' => 
    array (
      0 => 'mailTemplate:plaintext',
      1 => 1471017406,
      2 => 'mailTemplate',
    ),
  ),
  'nocache_hash' => '62441062957acdb6a3dd9b5-35420348',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_57acdb6a3f74b2_55881608',
  'variables' => 
  array (
    'client_name' => 0,
    'invoice_date_created' => 0,
    'invoice_payment_method' => 0,
    'invoice_num' => 0,
    'invoice_total' => 0,
    'invoice_date_due' => 0,
    'invoice_html_contents' => 0,
    'invoice_link' => 0,
    'signature' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57acdb6a3f74b2_55881608')) {function content_57acdb6a3f74b2_55881608($_smarty_tpl) {?><p>
Dear <?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
, 
</p>
<p>
This is a notice that an invoice has been generated on <?php echo $_smarty_tpl->tpl_vars['invoice_date_created']->value;?>
. 
</p>
<p>
Your payment method is: <?php echo $_smarty_tpl->tpl_vars['invoice_payment_method']->value;?>
 
</p>
<p>
Invoice #<?php echo $_smarty_tpl->tpl_vars['invoice_num']->value;?>
<br />
Amount Due: <?php echo $_smarty_tpl->tpl_vars['invoice_total']->value;?>
<br />
Due Date: <?php echo $_smarty_tpl->tpl_vars['invoice_date_due']->value;?>
 
</p>
<p>
<strong>Invoice Items</strong> 
</p>
<p>
<?php echo $_smarty_tpl->tpl_vars['invoice_html_contents']->value;?>
 <br />
------------------------------------------------------ 
</p>
<p>
You can login to your client area to view and pay the invoice at <?php echo $_smarty_tpl->tpl_vars['invoice_link']->value;?>
 
</p>
<p>
<?php echo $_smarty_tpl->tpl_vars['signature']->value;?>
 
</p>
<?php }} ?>
