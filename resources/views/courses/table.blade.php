<table class="table table-responsive" id="courses-table">
    <thead>
        <tr>
        <th></th>
        <th></th>
        <th></th>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($courses as $course)
        <tr>
            <td width="80%"><h3 style="margin-bottom: 0px">
                <a href="{!! route('courses.show', [$course->id]) !!}" style="color: black"> {!! $course->title !!} </a>
                    <h3> <br/>
            {!! $course->sub_title !!}<br/>
            </td>
            <td>{!! $course->photo !!}</td>
            <td></td>
            <td>
                <h3 style="margin-bottom: 0px">${!! $course->discount_price !!}</h3>
                <del style="text-decoration-style: double; padding-left: 10px">${!! $course->actual_price !!}</del>
            </td>
            
            <td>
                @if(Auth::user()->role_id < 3)
                {!! Form::open(['route' => ['courses.destroy', $course->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('courses.show', [$course->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('courses.edit', [$course->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>