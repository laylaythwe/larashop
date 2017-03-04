@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class='row' style='padding-top:25px; padding-bottom:25px;'>
        <div class='col-md-12'>
            <div id='mainContentWrapper'>
                <div class="col-md-8 col-md-offset-2">
                    <h3 style="text-align: center;">
                        Complete Your Order
                    </h3>
                    <br/>

                    <div class="shopping_cart">
                        {{ Form::open(['route' => 'frontend.checkoutprocess', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}
                           
                        
                            <div class="panel panel-default">

  <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Contact
                                            and Billing Information</a>
                                    </h4>
                                </div>






                                <div>
                                    <div class="">
                                       
                                        <table class="table table-striped" style="font-weight: bold;">
                                          
                                            
                                              <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_phone">Phone:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_phone" name="phone" type="text"/>
                                                </td>
                                            </tr>
                                              <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_email">Email:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_email" name="email"
                                                           required="required" type="text" value="{{Auth::user()->email}}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_address_line_1">Address:</label></td>
                                                <td colspan="3">
                                                    <input class="form-control" id="id_address_line_1"
                                                           name="address" required="required" type="textarea"/>
                                                </td>
                                            </tr>
                                       
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_city">City:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_city" name="city"
                                                           required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_state">State:</label></td>
                                                <td>
                                                    <select class="form-control" id="id_state" name="state">
                                                        <option value="AK">Yangon</option>
                                                        <option value="AL">Mandalay</option>
                                                        <option value="AZ">Bago</option>
                                                        <option value="AR">Mgway</option>
                                                       
                                                     
                                                    </select>
                                                </td>
                                            </tr>
                                        
                                          

                                        </table>
                                    </div>
                                </div>
                            </div>
                      
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="">
                                            <b>Payment Information</b>
                                        </a>
                                    </h4>
                                </div>
                                <div>
                                    <div>
                                        <span class='payment-errors'></span>
                                        <fieldset>
                                            

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="card-number">Payment Method</label>
                                                <div class="col-sm-9">
                                                    <input type="radio" stripe-data="number" id="card-number" name="payment_method" value="1">Cash On Only
                                                    <input type="radio" stripe-data="number" name="payment_method" value="2">Paypal
                                                    <br/>
                                                    <div><img class="pull-right"
                                                              src="https://s3.amazonaws.com/hiresnetwork/imgs/cc.png"
                                                              style="max-width: 250px; padding-bottom: 20px;">
                                                    </div>
                                                </div>
                                            </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="cvv">Payment Phone</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" stripe-data="cvc"
                                                               id="card-cvc" name="payment_phone">
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="cvv">Payment Email</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" stripe-data="cvc"
                                                               id="card-cvc" name="payment_email">
                                                    </div>
                                                    </div>
                                        </fieldset>
                                        <button type="submit" class="btn btn-success btn-lg" style="width:100%;">Pay
                                            Now
                                        </button>
                                        <br/>
                                       
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('secondary_content')
    

@endsection