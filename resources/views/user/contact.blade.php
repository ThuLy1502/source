@extends('user.main')

@section('content')
<!-- contact content -->
<!-- Start Contact Us -->
<div id="Contact" class="light-wrapper">
    <div class="container inner">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="Contact-Form">
                        <form class="leave-comment contact-form" method="post" action="#" id="cform" autocomplete="on">
                            <div class="Contact-us">
                                <div class="form-input col-md-4">
                                    <input type="text" name="name" placeholder="Nhập tên" required>
                                </div>
                                <div class="form-input col-md-4">
                                    <input type="email" name="email" placeholder="Nhập email" required>
                                </div>
                                <div class="form-input col-md-4">
                                    <input type="text" name="contact_phone" placeholder="Nhập số điện thoại">
                                </div>
                                <div class="form-input col-md-12">
                                    <textarea class="txt-box textArea" name="message" cols="40" rows="7" id="messageTxt"
                                        placeholder="Nhập thông điệp" spellcheck="true" required></textarea>
                                </div>
                                <div class="form-submit col-md-12">
                                    <input type="submit" class="btn btn-custom-6" value="Gửi">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div class="Contact-Info">
                    <h4> Chi tiết liên hệ</h4>
                    <div class="tex-contact">
                        <p> Nếu có điều chi thắc mắc, khách hàng vui lòng liên hệ với số điện thoại, email 
                            hoặc tới địa chỉ dưới đây. Xin cám ơn.</p>
                    </div>
                    <div class="Block-Contact col-md-6">
                        <p>SĐT :</p>
                        <ul>
                            <li>
                                <i class="fa fa-phone"></i>
                                <span> 096 569 2223</span>
                            </li>
                        </ul>
                    </div>
                    <div class="Block-Contact col-md-6">
                        <p>Email :</p>
                        <ul>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <span> bookwebsite@gmail.com </span>
                            </li>
                        </ul>
                    </div>
                    <div class="Block-Contact col-md-12">
                        <p> Địa chỉ :</p>
                        <ul>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <span> 180 Cao Lỗ, phường 4, quận 8, tp Hồ Chí Minh.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Contact Us -->
<!-- end contact content -->
@endsection