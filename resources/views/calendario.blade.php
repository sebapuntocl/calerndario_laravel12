@extends('layouts.app')

@section('title', 'Calendario Mensual')

@push('styles')
<style>
    .calendar {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 1px;
        background: #dee2e6;
    }
    .day-cell {
        background: white;
        min-height: 140px;
        padding: 5px;
        position: relative;
    }
    .day-cell header {
        font-weight: bold;
    }
    .actividad {
        background: #007bff;
        color: white;
        padding: 2px 4px;
        margin-top: 5px;
        font-size: 0.8rem;
        border-radius: 3px;
    }
</style>
@endpush

@section('content')
    <h1 class="mb-4 text-center">📆 Calendario Mensual</h1>

    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-2">
            <label for="mes" class="form-label">Mes</label>
            <select name="mes" id="mes" class="form-select">
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ $mes == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="col-md-2">
            <label for="anio" class="form-label">Año</label>
            <input type="number" name="anio" id="anio" class="form-control" value="{{ $anio }}">
        </div>
        <div class="col-md-2 align-self-end">
            <button type="submit" class="btn btn-primary">Ver</button>
        </div>
    </form>

    <div class="calendar mb-4">
        @php
            use Carbon\Carbon;
            $startOfMonth = Carbon::createFromDate($anio, $mes, 1);
            $endOfMonth = $startOfMonth->copy()->endOfMonth();
            $firstDayOfWeek = $startOfMonth->dayOfWeek;
            $daysInMonth = $startOfMonth->daysInMonth;
            $actividadesPorDia = $actividades->groupBy('fecha');
        @endphp

        @foreach(['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'] as $dia)
            <div class="bg-dark text-white text-center fw-bold py-2">{{ $dia }}</div>
        @endforeach

        @for ($i = 0; $i < $firstDayOfWeek; $i++)
            <div class="day-cell bg-light"></div>
        @endfor

        @for ($day = 1; $day <= $daysInMonth; $day++)
            @php
                $fechaActual = Carbon::createFromDate($anio, $mes, $day)->format('Y-m-d');
            @endphp
            <div class="day-cell" onclick="abrirModal('{{ $fechaActual }}')">
                <header>{{ $day }}</header>
                @if($actividadesPorDia->has($fechaActual))
                    @foreach($actividadesPorDia[$fechaActual] as $actividad)
                        <a href="{{ route('actividades.edit', $actividad->id) }}" onclick="event.stopPropagation();" class="actividad text-decoration-none d-block text-white">
                            <i class="bi bi-calendar-event-fill"></i>
                            {{ $actividad->hora ? substr($actividad->hora, 0, 5) . ' - ' : '' }}
                            {{ $actividad->titulo }}
                        </a>
                    @endforeach
                @endif
            </div>
        @endfor
    </div>

    @include('modals.mdl_nuevaActividad') {{-- incluye el modal --}}
@endsection

@push('scripts')
<script>
    function abrirModal(fecha) {
        document.getElementById('modal_fecha').value = fecha;
        const modal = new bootstrap.Modal(document.getElementById('modalActividad'));
        modal.show();
    }
</script>
@endpush
