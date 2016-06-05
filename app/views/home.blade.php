@extends("layout.master")

@section('top-contents')
<div class="row-fluid">
    <div class="span12">

        <div id="headerSeparator"></div>

        <div class="row-fluid" style="background-image: url(img/nyerere_1976_state_house.jpg);">
            <div class="span6" >


            </div>
            <div class="span6">

                <div id="camera_wrap">

                    <div data-src="img/pic-2.jpg" >

                    </div>
                    <div data-src="img/image10.png" >

                    </div>
                    <div data-src="img/Nyerereday.JPG" >
                        <div style="position:absolute;bottom:10%;left:3%;padding:10px;width:50%;" class="fadeIn camera_effected camera_caption cap2">
                            Nyerere Day oct 14th 2014 at Nkurumah Hall
                        </div>
                    </div>
                    <div data-src="img/image2.png" >

                    </div><div data-src="img/Lumumba.JPG" >
                        <div style="position:absolute;bottom:10%;left:3%;padding:10px;width:50%;" class="fadeIn camera_effected camera_caption cap1">
                            Installation of Prof. Patric Lumumba
                        </div>
                    </div>
                    <div data-src="img/image8.png" >
                        <div style="position:absolute;bottom:10%;left:3%;padding:10px;width:50%;" class="fadeIn camera_effected camera_caption cap1">
                            Installation of Mr Samin Amir
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="headerSeparator2"></div>

    </div>
</div>

@stop

@section("contents")

<div class="contentArea">

    <div class="divPanel notop page-content">



        <div class="row-fluid">
<div class="span9">
    <div class="span12" id="divMain">

        <h1>Welcome</h1>

        <p>
            The Mwalimu Nyerere Professorial Chair in Pan African Studies of the University of Dar es Salaam was established in April 2008, in honour of the great nationalist, pan - Africanist leader and first President of the United Republic of Tanzania, Mwalimu Julius Kambarage Nyerere.
        </p>
        <p>
            The first five – years of the Chair have witnessed rigorous intellectual discourse which has brought together intellectuals from across Africa to reflect on pertinent development concerns for the African continent. This phase was steered by Professor Issa Shivji who was the first Chair holding the position from 2008 to 2013. Profesor Penina Mlama is the current Chair, appointed to the post in 2014.
        </p>

        <br />

        <div class="row-fluid">
            <div class="span4">
                <h2>Upcoming Events</h2>
                {{ HTML::image("img/nyerere_1976_state_house.jpg","",array("class"=>"img-rounded","style"=>"height:150;width:270;margin-bottom:15px;margin-top:5px")) }}
                <p>Our next event will be on 14<sup>th</sup> to 16<sup>th</sup> June 2016, please keep your diaries open.
                    <br />
                    <a href="#">Read More &raquo;</a>
                    <br />
                    <br />
                    <a href="{{asset('Bronchure.pdf') }}" class="btn btn-success"><i class="icon-download"></i> Get Our Bronchure </a>

                </p>
            </div>
            <div class="span4">
                <h2>News & events</h2>
                {{ HTML::image("img/Lumumba.JPG","",array("class"=>"img-rounded","style"=>"height:150px;width:270px;margin-bottom:15px;margin-top:5px")) }}
                <p>
                    aunching of 9 school-based Mwalimu Nyerere ideals forum at Azania secondary school 28th may 2016.
                    Guest of honour was DSM City Mayor Isaya Mwita
                    <br /><a href="{{ url('festival') }}">Read More &raquo;</a></p>
            </div>
            <div class="span4" id="footerArea4">

                <h3>Get in Touch</h3>

                <ul id="contact-info">

                    <li>
                        <i class="general foundicon-phone icon" style="margin-bottom:70px"></i>
                        <span class="field">Phone:</span>
                        <br />
                        +255 22-2410763<br />
                        +255 22-2410655<br />
                        +255 754 561 703<br />
                        +255 672 875 185
                    </li>
                    <li>
                        <i class="general foundicon-mail icon" style="margin-bottom:50px"></i>
                        <span class="field">Email:</span>
                        <br />
                        <a href="mailto:mwalimuchair@udsm.ac.tz" title="Email">mwalimuchair@udsm.ac.tz</a><br>
                        <a href="mailto:penina_2000@yahoo.com" title="Email">penina_2000@yahoo.com</a><br>
                        <a href="mailto:lokiowi@yahoo.com" title="Email">lokiowi@yahoo.com</a>
                    </li>
                    <li>
                        <i class="general foundicon-home icon" style="margin-bottom:210px"></i>
                        <span class="field">Address:</span>
                        <br />
                        Mwalimu Julius Nyerere Chair in Pan African Studies<br />
                        University of Dar es Salaam<br />
                        <!--                                Mwalimu Julius Nyerere Campus<br />-->
                        school of business UDEC building<br />
                        1st floor, office no. 207,208,2009<br />
                        P.O.BOX 35091<br />
                        Dar Es Salaam, Tanzania<br />

                    </li>
                </ul>

            </div>
        </div>

    </div>
</div>
            <div class="span3" style="padding-top:25px; margin: 5px ">
                <div class="row-fluid" style="font-family: Maven Pro;">

                    <img src="{{ asset('ProfPeninaOnivielMlama.jpg') }}" style="width: 300px;height: 250px" class="img-rounded"/>
                    <h5>Current Chairperson of the Mwalimu Nyerere Professorial chair in pan african studies, Prof. Penina M. Mlama. </h5>
                </div>
                <div class="fb-like-box" data-href="https://www.facebook.com/kigodachamwalimunyerere" data-colorscheme="light" data-show-faces="true" data-height="300" data-header="true" data-stream="true" data-show-border="false"></div><!--                <img src="{{ asset('img/nkurumah.jpg') }}" />-->
            </div>




        </div>

        <div id="footerInnerSeparator"></div>
    </div>
</div>

@stop
