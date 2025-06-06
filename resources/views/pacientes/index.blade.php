@extends('layout.app')
@section('title', 'Pacientes')
@section('content')
    <div class="container mt-5">
        <h1>Lista de Pacientes</h1>

        @if (session('success'))
            <div
                style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; margin-bottom: 15px;">
                {{ session('success') }}
            </div>
        @endif

        @if ($paciente->isEmpty())
            <p>No hay pacientes registrados.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DUI</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paciente as $pa)
                        <tr>
                            <td>{{ $pa->id }}</td>
                            <td>{{ $pa->nombre }}</td>
                            <td>{{ $pa->apellido }}</td>
                            <td>{{ $pa->DUI }}</td>
                            <td>{{ $pa->fecha_nacimiento ? \Carbon\Carbon::parse($pa->fecha_nacimiento)->format('d/m/Y') : 'N/A' }}
                            </td>
                            <td>{{ $pa->telefono ?? 'N/A' }}</td>
                            <td>{{ $pa->email ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
