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
                                        src="https://maps.google.com/maps?q=manhatan&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                        style="border: 0" allowfullscreen=""></iframe>
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
                                        <input type="text" id="phone" name="phone" placeholder="Téléphone..." required />
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