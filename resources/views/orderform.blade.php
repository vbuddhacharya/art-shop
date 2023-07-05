<!DOCTYPE html>
<html>
<head>
  <title>Arts|Order</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/orderform.css') }}">

</head>
<body>
    <div class="container">
        <div class="art-image">
        <img src="{{ asset('images/pic/abt.png') }}" alt="Chosen Art">
        </div>

        <form>
            <h1>Place your Order Here </h1>
            <table cell-padding="0" cell-spacing="0">
                <tr>
                    <div class="form-group">
                        <td colspan="5">
                            <label for="location" class="larger-cell">Delivery Location</label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="text" id="location" required>
                        </td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <td colspan="5">
                            <label for="contact" class="larger-cell">Contact</label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="text" id="contact" required>
                        </td>
                    </div>
                </tr>
   
                <tr>
                    <div class="form-group">
                        <td colspan="5">
                            <label for="price" class="larger-cell">Total Price</label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="text" id="price" value="1000" readonly>
                        </td>
                    </div>
                </tr>

                <tr>
                    <div class="form-group">
                        <td colspan="5">
                            <label for="delivery-charge" class="larger-cell">Delivery Charge</label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="text" id="delivery-charge" value="100" readonly>
                        </td>
                    </div>
                </tr>

                <tr>
                    <div class="form-group">
                        <td colspan="5">
                            <label for="total" class="larger-cell">Grand Total</label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="text" id="total" value="1100" readonly>
                        </td>
                    </div>
                </tr>
                <!-- <div class="form-group">
                <label for="price">Total Price</label>
                <input type="text" id="price" value="1000" readonly>
                </div> -->

                <!-- <div class="form-group">
                    <label for="delivery-charge" >Delivery Charge</label>
                    <input type="text" id="delivery-charge" value="100" readonly>
                </div> -->
                
                <!-- <div class="form-group">
                    <label for="total">Total</label>
                    <input type="text" id="total" value="1100" readonly>
                </div> -->
            </table>

            <div class="buttons">
                <input type="submit" value="Confirm" class="confirm">
                <input type="reset" value="Cancel" class="cancel">
            </div>

        </form>
    </div>
</body>
</html>
