<div>
    <style>
        h1 {
            text-align: center;
            font: bold;
            font-family: Arial, Helvetica, sans-serif;
            background: #92bb63;
            color: #fff;
            border: 2px solid #8aa16f;
            border-radius: 15px;
            padding: 6px 0 6px 0;
        }
        h2{
            /* font-family: Helvetica; */
            font-family:'Helvetica';
        }

        div {
            text-align: center;
        }

        label {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1.3rem;
        }

        table {
            font-family: Arial, Helvetica, sans-serif;
            width: 300px;
            height: 100px;
            border-radius: 15px;
            margin-top: 12px;
            background: #ebebeb;
            box-shadow: 0px 0px 60px #17202A;

        }

        td {
            text-align: center;
        }

        tr {

            color: #17202A;

        }

        th {
            color: #17202A(255, 255, 255);
        }
    </style>
    <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">
        <!--Title-->
        <h2 style="text-align:center; margin-bottom:2rem;"><span style="color:#f0cd33; font-size:3rem;">MI</span> <span style="color:#457B9D; font-size:3rem;">ALEXIA</span></h2>
        <h1>
            Reporte de Ventas
        </h1>
        @if (empty($fecha_inicio) && empty($fecha_fin))
            <div>
                <x-jet-label value="Total de Ingresos:" />
                <strong style="font-size:1.4rem;">S/ {{ $sumtotal }}</strong>
            </div>
        @else
            <div>
                <label for="">Fecha Inicio:</label>
                <input type="date"><b style="font-size:1.2rem;">{{ $fecha_inicio }}</b>
                <label for=""> ~  Fecha Fin:</label>
                <input type="date"> <b style="font-size:1.2rem;">{{ $fecha_fin }}</b><br><br>
                <x-jet-label value="Total de Ingresos:" />
                <strong style="font-size:1.4rem;">S/ {{ $sumtotal }}</strong>
            </div>
        @endif

        <!--Card-->
        <div id='recipients' class="p-8 mb-6 mt-4 lg:mt-0 rounded shadow bg-white">
            <table id="example" class="stripe hover" style="width:100%; margin-top: 2em; padding-top: 1em; ">
                <thead>
                    <tr>
                        <th data-priority="1">N° Orden</th>
                        <th data-priority="1">Mesero</th>
                        <th data-priority="2">Fecha</th>
                        <th data-priority="3">N° Mesa</th>
                        <th data-priority="1">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }} </td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}</td>
                            <td>{{ $order->table->name }}</td>
                            <td>S/ {{ $order->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    {{-- -------------------------------------------------- --}}

</div>
