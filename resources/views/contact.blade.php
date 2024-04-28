<!DOCTYPE html>
<html class="no-js" lang="en">

<body>

    @include('layouts.head')
    @include('layouts.header')
    @include('layouts.headsection')


    <!--=========== Contact Section Start =========-->
    <div class="tj-contact-section tj-contact-page">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="contact-left-content">
                        <div class="tj-sec-heading-two">
                            <span class="sub-title">Pour un nouveau monde</span>
                            <h2 class="title">
                                Let’s Make
                                <span>Some Change</span>
                            </h2>
                            <div class="desc">
                                <p>
                                    TANDIS Invest est véhicule hybride de financement en capital destiné à promouvoir
                                    l’entrepreneuriat africain innovant et à fort impact environnemental et social via
                                    l’épargne des africaines .
                                </p>
                            </div>
                            <div class="contact-map">
                              
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d497.6029436705163!2d11.5014072!3d3.8480238!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x108bcf73220453fb%3A0x79daeaad1a14d61b!2sHappy%20Plus!5e0!3m2!1sfr!2scm!4v1713803176041!5m2!1sfr!2scm"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tj-contact-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-input">
                                    <input type="text" id="nameOne" name="name" placeholder="Votre Nom...."
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-input">
                                    <input type="text" id="phone" name="phone" placeholder="Téléphone..."
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-input">
                                    <input type="email" id="emailTwo" name="email" placeholder="Entrer votre Email"
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-input">
                                    <input type="text" id="site" name="ville" placeholder="Entrer votre ville"
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-input">
                                    <textarea id="message" name="message" placeholder="Entrer votre message...."></textarea>
                                </div>
                            </div>
                            <div class="tj-contact-button">
                                <button class="tj-primary-btn2 btn" type="submit" value="submit">
                                    Contacter nous <i class="flaticon-right-arrow"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=========== Contact Section End =========-->

    </main>

    @include('layouts.footer')

</html>
