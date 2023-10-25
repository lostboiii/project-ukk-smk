@extends('layouts.menudash')
@section('content')
<table class="wrapper all-font-sans" width="100%" height="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
      <td align="center" style="padding: 24px;" width="100%">
        <table class="sm-w-full" width="600" cellpadding="0" cellspacing="0" role="presentation">
          <tr>

            </td>
          </tr>
            <td align="left" class="sm-p-20 sm-dui17-b-t" style="border-radius: 2px; padding: 40px; position: relative; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, .1), 0 4px 6px -2px rgba(0, 0, 0, .05); vertical-align: top; z-index: 50;" bgcolor="#ffffff" valign="top">
              <table width="100%"  >
                <tr>
                  <td width="80%">
                    <h1 class="sm-text-lg all-font-roboto" style="font-weight: 700; line-height: 100%; margin: 0; margin-bottom: 4px;  margin-left: 150px; font-size: 24px; text-align:center;">Struk</h1>
                  </td>
                  <td style="text-align: right;" width="20%" align="right">
                  </td>
                </tr>
              </table>
              <div style="line-height: 32px;">&zwnj;</div>
              <table class="sm-leading-32" style="line-height: 28px; font-size: 14px;" width="100%">
                <tr>
                  <td class="sm-inline-block" style="color: #718096;" width="50%">Nama Pemesan</td>
                <td class="sm-inline-block" style="font-weight: 600; text-align: right;" width="50%" align="right">{{$orders->user->name}}</td>
                </tr>
                <tr>
                  <td class="sm-inline-block" style="color: #718096;" width="50%">Meja</td>
                  <td class="sm-inline-block" style="font-weight: 600; text-align: right;" width="50%" align="right">{{$orders->meja}}</td>
                </tr>
                <tr>
                  <td class="sm-w-1-4 sm-inline-block" style="color: #718096;" width="50%">Tanggal</td>
                  <td class="sm-w-3-4 sm-inline-block" style="font-weight: 600; text-align: right;" width="50%" align="right">{{$orders->tanggal}}</td>
                </tr>
                <tr>
                    <td class="sm-w-1-4 sm-inline-block" style="color: #718096;" width="50%">Pesanan:</td>
                  </tr>
                <tr>
                  <td class="sm-w-3-4 sm-inline-block" style="font-weight: 600; text-align: left;" width="50%" align="left">
                    @foreach ($order_detail as $detail)
                                        @if ($detail->order_id == $orders->id)
                                        {{$detail->masakan->nama_masakan}} <br>
                    @endif
                    @endforeach</td>
                  <td class="sm-w-3-4 sm-inline-block" style="font-weight: 600; text-align: right;" width="50%" align="right">
                    @foreach ($order_detail as $detail)
                                        @if ($detail->order_id == $orders->id)
                                         ${{$detail->masakan->harga}} <br>
                    @endif
                    @endforeach</td>
                </tr>
              </table>
              <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                  <td style="padding-top: 24px; padding-bottom: 24px;">
                    <div style="background-color: #edf2f7; height: 2px; line-height: 2px;">&zwnj;</div>
                  </td>
                </tr>
              </table>
              <table style="line-height: 28px; font-size: 14px;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                  <td style="color: #718096;" width="50%">Status Pesanan</td>
                  <td style="font-weight: 600; text-align: right;" width="50%" align="right">{{$orders->status_order}}</td>
                </tr>
                <tr>
                    <td class="sm-inline-block" style="color: #718096;" width="50%">Total Harga</td>
                  <td class="sm-inline-block" style="font-weight: 600; text-align: right;" width="50%" align="right"> ${{$orders->total_harga}}</td>
                  </tr>
                <tr>
                  <td style="font-weight: 600; padding-top: 32px; color: #000000; font-size: 20px; text-align:center; padding-left: 60px; " width="100%">Makasih banh Dah Pesen</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

@endsection
{{-- <script>
    window.print();
</script> --}}
