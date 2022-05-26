<div>
    <div class="container" style="padding: 30px 0;">
        <div class="container bootstrap snippet" style="margin-left: 20px; width: 90%">
            
            <div class="row">
                <div class="col-sm-3"><!--left col-->
                <div class="text-center">
                    @if($user->profile->image)
                        <img src="{{ asset('/assets/images/profiles') }}/{{ $user->profile->image }}" class="avatar img-circle img-thumbnail" alt="avatar">
                    @else
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                        <h6>Upload a different photo...</h6>
                    @endif
                    <input type="file" class="text-center center-block file-upload"> 
                </div>
                <div class="row text-center">
                    <div class="col-sm-12" class="text-center"><h2>{{ $user->name }}</h2></div>
                </div>
                <hr><br>
                
                <div class="panel panel-default">
                    <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                    <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
                </div>       
                   
                <ul class="list-group">
                    <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Recruitments</strong></span>{{ $totalRecruitments }}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Recruitments Processing</strong></span>{{ $totalRecruitments_processing }}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Recruitments Canceled</strong></span>{{ $totalRecruitments_canceled }}</li>
                </ul> 
                       
                <div class="panel panel-default">
                    <div class="panel-heading">Social Media</div>
                    <div class="panel-body">
                        <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
                    </div>
                </div>
                  
                </div><!--/col-3-->
                <div class="col-sm-9">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                        <li><a data-toggle="tab" href="#messages">Menu 1</a></li>
                        <li><a data-toggle="tab" href="#settings">Menu 2</a></li>
                    </ul>      
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <hr>
                            <form class="form" action="##" method="post" id="registrationForm">
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="first_name"><h4>First name</h4></label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                                        @error('first_name') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="last_name"><h4>Last name</h4></label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                                        
                                    </div>
                                </div>
                
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="phone"><h4>Phone</h4></label>
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                                    </div>
                                </div>
                
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="mobile"><h4>Mobile</h4></label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="email"><h4>Email</h4></label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="email"><h4>Location</h4></label>
                                        <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="password"><h4>Password</h4></label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="password2"><h4>Verify</h4></label>
                                        <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                        <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                    </div>
                                </div>
                            </form>
                            <hr> 
                        </div><!--/tab-pane-->
                        <div class="tab-pane" id="messages">
                            <hr>
                            <form class="form" action="##" method="post" id="registrationForm">
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="first_name"><h4>First name</h4></label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="last_name"><h4>Last name</h4></label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="phone"><h4>Phone</h4></label>
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="mobile"><h4>Mobile</h4></label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                                    </div>
                                </div>
        
                                <div class="form-group">                            
                                    <div class="col-xs-6">
                                        <label for="email"><h4>Email</h4></label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                                    </div>
                                </div>
        
                                <div class="form-group">                            
                                    <div class="col-xs-6">
                                        <label for="email"><h4>Location</h4></label>
                                        <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                                    </div>
                                </div>
        
                                <div class="form-group">                            
                                    <div class="col-xs-6">
                                        <label for="password"><h4>Password</h4></label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                                    </div>
                                </div>
        
                                <div class="form-group">                            
                                    <div class="col-xs-6">
                                        <label for="password2"><h4>Verify</h4></label>
                                        <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                        <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                    </div>
                                </div>
                              </form>
                        </div><!--/tab-pane-->
                        <div class="tab-pane" id="settings">
                            <hr>
                            <form class="form" action="##" method="post" id="registrationForm">
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="first_name"><h4>First name</h4></label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="last_name"><h4>Last name</h4></label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="phone"><h4>Phone</h4></label>
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="mobile"><h4>Mobile</h4></label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                                    </div>
                                </div>
        
                                <div class="form-group">                            
                                    <div class="col-xs-6">
                                        <label for="email"><h4>Email</h4></label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                                    </div>
                                </div>
        
                                <div class="form-group">                            
                                    <div class="col-xs-6">
                                        <label for="email"><h4>Location</h4></label>
                                        <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                                    </div>
                                </div>
        
                                <div class="form-group">                            
                                    <div class="col-xs-6">
                                        <label for="password"><h4>Password</h4></label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                                    </div>
                                </div>
        
                                <div class="form-group">                            
                                    <div class="col-xs-6">
                                        <label for="password2"><h4>Verify</h4></label>
                                        <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                        <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                    </div>
                                </div>
                              </form>
                        </div><!--/tab-pane-->
                    </div><!--/tab-content-->
                </div><!--/col-9-->
            </div><!--/row-->
        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(document).ready(function() {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.avatar').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(".file-upload").on('change', function(){
                readURL(this);
            });
        });
    </script>
@endpush