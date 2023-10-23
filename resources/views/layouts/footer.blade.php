<section id="footer">
    <div class="container">
        <footer class="row py-5">
            <div class="col-12 col-md-3 mb-3">
                <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                    <img src="{{ asset('./img/footer_logo.png') }}" class="img-fluid" style="max-height: 45px" alt="Logo">
                </a>
                <a href="{{$info[0]['facebook']}}" class="footer_soc">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="{{$info[0]['instagram']}}" class="footer_soc">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
            <div class="col-12 col-md-2 mb-3">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="#" class="footer_link p-0">Products</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="footer_link p-0">Projects</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="footer_link p-0">Showroom</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="footer_link p-0">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-5 mb-3">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="mailto:{{$info[0]['email']}}" class="footer_link p-0">
                            <i class="fa-regular fa-envelope"></i>
                            {{$info[0]['email']}}
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="tel:{{$info[0]['phone1']}}" class="footer_link p-0">
                            <i class="fa-solid fa-phone"></i>
                            {{$info[0]['phone1']}}
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="tel:{{$info[0]['phone2']}}" class="footer_link p-0">
                            <i class="fa-solid fa-phone"></i>
                            {{$info[0]['phone2']}}
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <p class="footer_link p-0">
                            <i class="fa-solid fa-location-dot"></i>
                            {{$info[0]['address']}}
                        </p>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
</section>
