<form target="_blank" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<!-- Indica que vamos a hacer una compra tipo boton comprar ahora -->
<input type="hidden" name="cmd" value="_xclick">
<!-- Indica que no se presente un campo para notas extras  -->
<input type="hidden" name="no_note" value="1">
<!-- la moneda correspondiente  -->
<input type="hidden" name="currency_code" value="USD">
<!-- El precio del producto -->
<input type="hidden" name="amount" value="100">
<!-- El nombre del producto -->
<input type="hidden" name="item_name" value="Pala de Jardin">
<!-- El ID de item -->
<input type="hidden" name="item_number" value="2556">
<!-- indica si existirá un select para cambiar precio segun alguna cualidad, si se indica 0 significa que el precio es unico -->
<input type="hidden" name="option_index" value="0">
<!-- La cantidad del producto a pagar  -->
<input type="hidden" name="quantity" value="1">
<!-- Se debe indicar el ID o email con el que te registraste y abriste la cuenta en paypal donde recibes el dinero  -->
<input type="hidden" name="business" value="correovelasoft@gmail.com">
<!-- La URL donde se informa el resultado de la transaccion como POST -->
<input type="hidden" name="notify_url" value="http://web.com/pagosRecibidos/notificarse" >
<!-- La URL donde redirecciona al finalizar la compra (la clasica pagina de gracias) -->
<input type="hidden" name="return" value="http://web.com/pagosRecibidos/gracias" >
<!-- Una imagen propia o la imagen de paypal del boton COMPRAR AHORA -->
<input  type="image" src="images/buy.gif" border="0" name="submit" alt="Comprar" title="Comprar">
</form>
