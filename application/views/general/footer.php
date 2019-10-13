    <section id="contact" class="content-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                      <div class="col-12">
                        <iframe style="border: 10px solid rgba(255, 255, 255, 0.43);" width="100%" height="400px" id="gmap_canvas" src="https://maps.google.com/maps?q=Babakan%20Asem%20sumedang&t=k&z=11&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center sub-title">KONTAK</h3>
                            <ul class="list-group contact-info">
                                <li class="list-group-item"><i class="fas fa-location-arrow"></i> Jln. Babakan Asem No.142, Kecamatan Conggeang, Kabupaten Sumedang, 45391.</li>
                                <li class="list-group-item"><i class="fas fa-mobile"></i> +62813-2163-4616</li>
                                <li class="list-group-item"><i class="fas fa-envelope"></i> <a  href="mailto:desa.babakanasem142@gmail.com">desa.babakanasem142@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <br/>
                            <h4 class="sub-title">Simadesa Apps</h4>
                            <br/>
                            <a href="https://play.google.com/store/apps/details?id=com.agunwgn.simadesa">
                                <img class="playstore" src="<?= base_url('src/general/img/playstore.png') ?>" alt="" style="width:250px; height:100px">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="footbar" class="content-footbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <span>© Simadesa <?= date('Y')?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- WhatsHelp.io widget -->
    <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "+6287827997797", // WhatsApp number
                call_to_action: "Hubungi Kami", // Call to action
                position: "left", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
    <!-- /WhatsHelp.io widget -->
  </body>
</html>