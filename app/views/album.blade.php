@extends("layout.master")

@section("contents")
    <div class="contentArea" >
        <div class="divPanel notop page-content">
            <h2 style="text-align: center">PHOTO ALBUM</h2>
            <div id="camera_wrap">
                <div data-src="{{ asset("img/image1.png") }}" >
                    <div style="position:absolute;bottom:10%;left:3%;padding:10px;width:50%;" class="fadeIn camera_effected camera_caption cap1">
                        Mwalimu Nyerere and Karume in Zanzibar.
                    </div>
                </div>
                <div data-src="{{ asset("img/image2.png") }}" >
                    <div style="position:absolute;bottom:10%;left:3%;padding:10px;width:50%;" class="fadeIn camera_effected camera_caption cap1">
                        Mwalimu Nyerere preserving environment
                    </div>
                </div>
                <div data-src="{{ asset("img/east_africa_leaders_1964.jpg") }}" >
                    <div style="position:absolute;bottom:10%;left:3%;padding:10px;width:50%;" class="fadeIn camera_effected camera_caption cap1">
                        East Africa Leaders in 1964
                    </div>
                </div>
                <div data-src="{{ asset("img/image3.png") }}" >
                    <div style="position:absolute;bottom:10%;left:3%;padding:10px;width:50%;" class="fadeIn camera_effected camera_caption cap1">
                        Mwalimu Nyerere Tanga safari
                    </div>
                </div>
                <div data-src="{{ asset("img/image4.png") }}" >
                    <div style="position:absolute;bottom:10%;left:3%;padding:10px;width:50%;" class="fadeIn camera_effected camera_caption cap1">
                        Mwalimu sayying goodbye after leaving the office 1985
                    </div>
                </div>
                <div data-src="{{ asset("img/image5.png") }}" >

                </div>
                <div data-src="{{ asset("img/image6.png") }}" >
                    <div style="position:absolute;bottom:10%;left:3%;padding:10px;width:50%;" class="fadeIn camera_effected camera_caption cap1">
                        Installation of Mr Bereket
                    </div>
                </div>
                <div data-src="{{ asset("img/image9.png") }}" >
                    <div style="position:absolute;bottom:10%;left:3%;padding:10px;width:50%;" class="fadeIn camera_effected camera_caption cap1">
                        Installation of Mr Wolle Soyinka
                    </div>
                </div>
                <div data-src="{{ asset("img/image8.png") }}" >
                    <div style="position:absolute;bottom:10%;left:3%;padding:10px;width:50%;" class="fadeIn camera_effected camera_caption cap1">
                        Installation of Mr Samin Amir
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop