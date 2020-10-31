<div class="modal fade" id="colorModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="direction: rtl">
            <div class="modal-header text-center" style="background-color: #e1306c;">
                <h4 class="title  text-white " id="defaultModalLabel">ورود یا ثبت نام</h4>
                <button type="button" class="btn  btn-sm btn-round text-white" data-dismiss="modal"><i
                            class="ti-close"></i></button>

            </div>
            <div class="modal-body" style="color: #726a84">
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text">  <i class="ti-mobile"></i></span>
                        </div>
                        <input type="text" name="mobile" class="form-control" tabindex="1" placeholder="شماره موبایل "
                               value="{{old('mobile')}}" oninput="setCustomValidity('')"
                               oninvalid="this.setCustomValidity('لطفا شماره تلفن را وارد کنید')" required>

                        @if($errors->has('mobile'))
                            <small class="text-danger d-inline-block w-100  mt-2">
                                {{$errors->first('mobile')}}
                            </small>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                                    <span class="input-group-text" style="padding: .325rem .75rem;">
                                        <a href="{{url('password/reset')}}" class="forgot " title="فراموشی رمز عبور">
                                            <i class="ti-lock"></i>
                                        </a>
                                    </span>
                        </div>
                        <input type="password" name="password" tabindex="2" class="form-control" placeholder="رمزعبور"
                               oninput="setCustomValidity('')"
                               oninvalid="this.setCustomValidity('لطفا رمز عبور را وارد کنید')" required>

                        @if($errors->has('password'))
                            <small class="text-danger d-inline-block w-100  mt-2">
                                {{$errors->first('password')}}
                            </small>
                        @endif
                    </div>
                    <input type="checkbox" name="remember" checked class="d-none" id="remember_me">

                    <div class="input-group text-center d-flex">
                        <button type="submit" class="submit login-button ml-auto" tabindex="3">ورود</button>
                        <a href="{{route('register')}}" type="button" class=" new-button " tabindex="4">حساب جدید</a>

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>