@extends('backend.layouts.form')
@section('title', admin_lang('Edit Server for ' . $server->country))
@section('back', route('admin.servers.index'))
@section('container', 'container-xxl flex-grow-1 container-p-y')
@section('content')
<form id="billiongroup-submited-form" action="{{ route('admin.servers.update', $server->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card p-2">
        <div class="card-body">
            <div class="mb-4">
                <label class="form-label">
                    <div>{{ admin_lang('IP Address') }} : <span class="text-danger">*</span></div>
                    <input type="text" id="ip_address" name="ip_address" class="form-control"
                        value="{{$server->ip_address}}" required />
                </label>
            </div>
            <div class="row g-3">
                <div class="col-xl-6 col-md-6 col-sm-6 mb-4">
                    <label class="form-label">
                        <div>{{ admin_lang('Country') }} : <span class="text-danger">*</span></div>
                        <input id="country1" type="text" name="country" class="form-control"
                            value="{{$server->country}}" required />
                    </label>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-6 mb-4">
                    <label class="form-label">
                        <div>{{ admin_lang('Country') }} : <span class="text-danger">*</span></div>
                        <select id="country" class="form-select">
                            <option value="" selected disabled>{{ admin_lang('Choose') }}</option>
                            @foreach ($form->countries as $key => $country)
                            <option value="{{ $country }}">
                                {{ $country }}
                            </option>
                            @endforeach
                        </select>
                    </label>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-xl-6 col-md-6 col-sm-6 mb-4">
                    <label class="form-label">
                        <div>{{ admin_lang('State') }} : <span class="text-danger">*</span></div>
                        <input id="state1" type="text" name="state" value="{{$server->state}}" class="form-control"
                            required />
                    </label>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-6">
                    <label class="form-label">
                        <div>{{ admin_lang('Choice Manual') }} </div>
                        <select id="state" class="form-select" required>
                            <option value="" selected disabled>{{ admin_lang('Choose') }}</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-xl-6 col-md-6 col-sm-6 mb-4">
                    <label class="form-label">
                        <div>{{ admin_lang('Latitude') }} : <span class="text-danger">*</span></div>
                        <input type="text" name="latitude" id="latitude" class="form-control"
                            value="{{$server->latitude}}" required />
                    </label>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-6 mb-4">
                    <label class="form-label">
                        <div>{{ admin_lang('Longitude') }} : <span class="text-danger">*</span></div>
                        <input type="text" name="longitude" id="longitude" class="form-control"
                            value="{{$server->longitude}}" required />
                    </label>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">
                    <div>{{ admin_lang('Status') }} : <span class="text-danger">*</span></div>
                    <select name="status" id="status" class="form-select" required>
                        <option value="" selected disabled>{{ admin_lang('Choose') }}</option>
                        @foreach ($form->statusOptions as $key => $row)
                        <option value="{{ $key }}" {{ $server->status == $key ? 'selected' : '' }}>
                            {{ $row }}
                        </option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="mb-4">
                <label class="form-label">
                    <div>{{ admin_lang('Recommended') }} : <span class="text-danger">*</span></div>
                    <select name="recommended" id="recommended" class="form-select" required>
                        <option value="" selected disabled>{{ admin_lang('Choose') }}</option>
                        @foreach ($form->recommendOptions as $key => $row)
                        <option value="{{ $key }}" {{ $server->recommended == $key ? 'selected' : '' }}>
                            {{ $row }}
                        </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="mb-4">
                <label class="form-label">
                    <div>{{ admin_lang('Server Type') }} : <span class="text-danger">*</span></div>
                    <select name="is_premium" id="is_premium" class="form-select" required>
                        <option value="" selected disabled>{{ admin_lang('Choose') }}</option>
                        @foreach ($form->serverOptions as $key => $row)
                        <option value="{{ $key }}" {{ $server->is_premium == $key ? 'selected' : '' }}>
                            {{ $row }}
                        </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" id="installWgEasy" name="installWgEasy">
                <label class="form-check-label" for="installWgEasy">Re-Install Wireguard?</label>
            </div>
            <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" id="isOVPN" name="isOVPN" {{ $server->is_ovpn == 1 ?
                'checked' : '' }}>
                <label class="form-check-label" for="isOVPN">Is OVPN?</label>
            </div>
            <div class="mb-4 ovpn">
                <label class="form-label">
                    <div>{{ admin_lang('OVPN Config') }} :</div>
                    <textarea name="ovpn_config" id="ovpn_config" class="form-control"
                        rows="10">{{ $server->ovpn_config }}</textarea>
                </label>
            </div>
        </div>
    </div>
</form>
@push('scripts_libs')
<script>
    let g_country = '{{ $country = $server->country ?? old('country') }}'
  let g_state = '{{ $state = $server->state ?? old('state')}}'

  $(function() {
    $("#installWgEasy").prop("checked", false);

    // ovpn config
    $("#isOVPN").on('change', function () {
        if ($(this).is(':checked')) {
            $('.ovpn').show()
            $("#ovpn_config").attr("required", true)
        } else {
            $('.ovpn').hide()
            $("#ovpn_config").removeAttr("required")
        }
    })
    @if ($server->is_ovpn == 1)
        $("#isOVPN").prop("checked", true)
        $('.ovpn').show()
    @else
        $("#isOVPN").removeAttr("checked")
        $('.ovpn').hide()
    @endif
  })

  //get IP info
  $('#ip_address').on('blur', function() {
    const ip = $(this).val();
    let url = "{{ config('app.url') }}/admin/servers/ipinfo";
    if (ip) {
      url += `?ip=${ip}`;
      $.ajax({
          url: url,
          method: 'GET',
          success: function(response) {
              $('#latitude').val(response.location.latitude);
              $('#longitude').val(response.location.longitude);

              // Optionally, update the country and state selects if response contains this data
              $('#country1').val(response.location.country);  // Assuming country_code matches option value
              $('#state1').val(response.location.city); // Modify as needed for state logic
          },
          error: function(xhr) {
              console.error('An error occurred:', xhr);
          }
      });
    }
  });
  //get state
  $("#country").on('change', function() {
    if (this.value == '') return
    $('#country1').val(this.value);
    const param = this.value;
    $.ajax({
      url: "{{ config('app.url') }}/assets/data/countries_v1.json",
      type: "GET",
      success: function(countries) {
        // Mencari indeks elemen dengan attribute "name"
        const index = countries.findIndex(country => country.name === param);

        // Mendapatkan array key dari objek dengan attribute "name" bernilai "Indo"
        // const keysArray = index !== -1 ? Object.keys(countries[index]) : [];

        const states = countries[index]['states'];

        $('#state').html("");
        // mapping value ke select
        $.each(states, function(key, value) {
          $('#state')
            .append($('<option></option>')
            .attr('value', value.name)
            .text(value.name));
        });

        // jika state tidak kosong
        if (g_state != '') {
          $('#state').val(g_state)
          g_state = ''
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // terjadi error
        console.log("Error: " + textStatus);
      }
    });
  })

  $("#state").on('change', function() {
    if (this.value) {
        $('#state1').val(this.value);
    }
  });
  //autoload
  const country = $("#country").val(g_country)
  if (country != '') {
    $("#country").trigger("change")
  }
</script>
@endpush
@endsection
