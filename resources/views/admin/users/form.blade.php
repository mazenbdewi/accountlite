<div class="container" dir="rtl" lang="ar">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                       
                        <table class="striped">
                        <tr>
                          
                             <td class="col-md-4" >الاسم الكامل</td>

                        <td class="col-md-6">
                            {!! Form::text('name',null,['class'=>'form-control'])!!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </td>
                     
                       
                        </tr>
                        <tr>
                         
                             <td class="col-md-4" >الصلاحيات</td>
                            <td class="col-md-6">
                            {!! Form::select('admin',['0'=>'محاسب','1'=>'مدير','2'=>'بائع','3'=>'مندوب مبيعات','4'=>'أمين مستودع'],null,['class'=>'form-control'])!!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </td>
                      
                      

                        </tr>

                        <tr>
                     
                           <td class="col-md-4">اسم المستخدم</td>

                            <td class="col-md-6">
                            {!! Form::text('email',null,['class'=>'form-control'])!!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </td>
                       
                       

                       </tr>
                        <tr>
                          
                             <td class="col-md-4 ">نسبة الحسم %</td>
                            <td class="col-md-6">
                            {!! Form::text('userDisc',null,['class'=>'form-control'])!!}
                          

                                @if ($errors->has('userDisc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userDisc') }}</strong>
                                    </span>
                                @endif
                            </td>
                            
                           

                    </tr>

                       <tr>

                            @if(!isset($users))

                           <td  class="col-md-4 ">كلمة السر</td>

                            <td class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </td>
                           
                      </tr>

                      <tr>
                          
                             <td class="col-md-4 ">تأكيد كلمة السر</td>
                            <td class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </td>
                            
                           @endif

                    </tr>
                     
                    </table>
                        
                  </div>
            </div>
        </div>
    </div>
</div>