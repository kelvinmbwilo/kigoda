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
                    <div data-src="img/pic-1.jpg" >

                    </div>
                    <div data-src="img/Mlama.png" >
                        <div style="position:absolute;bottom:10%;left:3%;padding:10px;width:50%;" class="fadeIn camera_effected camera_caption cap1">
                            Installation of Prof. Pennina M Mlama
                        </div>
                    </div>
                    <div data-src="img/Lumumba.JPG" >
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
                        <p>Our next event will be on 14th october, please keep your diaries open.
                            <br />
                            <a href="{{ url("festival") }}">Read More &raquo;</a>
                            <br />
                            <br />
                            <a href="{{asset('Brochure.pdf') }}" class="btn btn-success"><i class="icon-download"></i> Get Our Bronchure </a>

                        </p>
                    </div>
                    <div class="span4">
                        <h2>News & events</h2>
                        {{ HTML::image("img/Lumumba.JPG","",array("class"=>"img-rounded","style"=>"height:150px;width:270px;margin-bottom:15px;margin-top:5px")) }}
                        <p>
                            Installation of the distinguished Nyerere Lecturer Prof. Patric Lumumba  during the 6th Mwalimu Nyerere Intellectual Festival – 9th- 11th April 2014.
                            <br /><a href="{{ url('festival') }}">Read More &raquo;</a></p>
                    </div>
                    <div class="span4" id="footerArea4">

                        <h3>Get in Touch</h3>

                        <ul id="contact-info">

                            <li>
                                <i class="general foundicon-phone icon" style="margin-bottom:50px"></i>
                                <span class="field">Phone:</span>
                                <br />
                                +255 22-2410763<br />
                                +255 754 561 703<br />
                                +255 754 281 837
                            </li>
                            <li>
                                <i class="general foundicon-mail icon"></i>
                                <span class="field">Email:</span>
                                <br />
                                <a href="mailto:mwalimuchair@udsm.ac.tz" title="Email">mwalimuchair@udsm.ac.tz</a>
                            </li>
                            <li>
                                <i class="general foundicon-home icon" style="margin-bottom:210px"></i>
                                <span class="field">Address:</span>
                                <br />
                                Mwalimu Julius Nyerere Chair in Pan African Studies<br />
                                University of Dar es Salaam<br />
<!--                                Mwalimu Julius Nyerere Campus<br />-->
                                IRA Building<br />
                                1st floor, Office no 317<br />
                                P.O.BOX 35091<br />
                                Dar Es Salaam, Tanzania<br />

                            </li>
                        </ul>

                    </div>
                </div>

            </div>

        </div>

        <div id="footerInnerSeparator"></div>
    </div>
</div>

@stop
