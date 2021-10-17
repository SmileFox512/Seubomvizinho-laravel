@inject('userinfo', 'App\UserInfo')
@inject('lang', 'App\Lang')
@extends('bsb.app')


@section('content')
<div class="q-card q-radius q-container">

    <!-- Tabs -->
    <ul class="nav nav-tabs tab-nav-right" role="tablist">
        <li role="presentation" class="active"><a href="#home" data-toggle="tab"><h4>{{$lang->get(637)}}</h4></a></li> {{--City--}}
    </ul>

    <!-- Tab List -->
    <div class="tab-content">

        <div role="tabpanel" class="tab-pane fade in active" id="home">
            <div class="row clearfix js-sweetalert">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="q-card q-radius q-container">
                        <div class="body">
                            <table id="data_table" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr id="table_header">
                                    <th>{{$lang->get(640)}}</th>    {{--City name--}}
                                    <th>{{$lang->get(74)}}</th>     {{--Action--}}
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>{{$lang->get(640)}}</th>    {{--City name--}}
                                    <th>{{$lang->get(74)}}</th>     {{--Action--}}
                                </tr>
                                </tfoot>
                                <tbody id="table_body">
                                {{--foods--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div id="form" class="q-mt20 q-pb20">
                <div class="row clearfix">
                    <div class="col-md-6 ">
                        <div class="col-md-8">
                            @include('elements.form.text', array('label' => $lang->get(637), 'text' => $lang->get(638), 'id' => "city", 'request' => "true", 'maxlength' => "50"))  {{-- City - Insert new city --}}
                        </div>
                        <div class="col-md-4">
                            @include('elements.form.button', array('label' => $lang->get(639), 'onclick' => "onSave();"))  {{-- Add city--}}
                        </div>
                    </div>

                </div>
            </div>

    </div>
</div>

<script>

    let arrCity = "{{$city}}".split(',');

    function initCityTable(){
        let html = "";
        arrCity.forEach(function (item) {
            if (item === "")
                return;
            html += `<tr>
            <td>${item}</td>
               <td>
                 <button type="button" class="q-btn-all q-color-alert waves-effect" onclick="showDeleteMessageCity('${item}')">
                    <div>{{$lang->get(308)}}</div> {{--Delete--}}
                 </button>
               </td>
            </tr>`;
        });
        document.getElementById("table_body").innerHTML = html;
    }

    initCityTable();

    function onSave(){
        if (!document.getElementById("city").value)
            return showNotification("bg-red", "{{$lang->get(641)}}", "bottom", "center", "", "");  // The City field is required.
        let t = document.getElementById("city").value.replace('\'', '');
        arrCity.push(t);
        initCityTable();
        saveToServer();
    }

    function showDeleteMessageCity(city) {
        @if ($demo == "true")
            showNotification("bg-red", "{{$lang->get(467)}}", "bottom", "center", "", "");  // This is demo app. You can not change this section
        @else
        swal({
            title: "{{$lang->get(81)}}",
            text: "{{$lang->get(82)}}",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "{{$lang->get(83)}}",
            cancelButtonText: "{{$lang->get(84)}}",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
                for (let i = arrCity.length; i--;)
                    if (arrCity[i] === city)
                        arrCity.splice(i, 1);
                initCityTable();
                saveToServer()
            } else {

            }
        });
        @endif
    }

    function saveToServer(){
        arrCity.removeAll("");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '{{ url("saveCity") }}',
            data: {
                city: arrCity.toString(),
            },
            success: function (data){
                console.log("saveCity", data);
                if (data.error !== "0")
                    return showNotification("bg-red", "{{$lang->get(479)}}", "bottom", "center", "", "");  // Something went wrong
                showNotification("bg-teal", "{{$lang->get(485)}}", "bottom", "center", "", ""); // Data saved
            },
            error: function(e) {
                console.log("saveCity", e);
                showNotification("bg-red", "{{$lang->get(479)}}", "bottom", "center", "", "");  // Something went wrong
            }}
        );
    }


    Array.prototype.empty = function() {
        for (var i = 0, s = this.length; i < s; i++) { this.pop(); }
        return this;
    };

    Array.prototype.removeAll = function(item) {
        var result = [];

        for (var i = 0, j = 0, s = this.length; i < s; i++) {
            if (this[i] != item) { result[j++] = this[i]; }
        }

        this.empty();
        for (var i = 0, s = result.length; i < s;) { this.push(result[i++]); }
    };

</script>

@endsection
