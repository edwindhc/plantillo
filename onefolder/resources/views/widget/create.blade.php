<div class="panel-group col-sm-12" id="accordion" style="padding-left: 0">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <i class="fa fa-plus"></i>
                    Add a New Widget                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">

                <form action="/widget" method="post">

                    {{ csrf_field() }}

                    {!! \Nvd\Crud\Form::input('title','text')->show() !!}

                    {!! \Nvd\Crud\Form::textarea( 'content' )->show() !!}

                    {!! \Nvd\Crud\Form::input('position','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('page','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('location','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('status','text')->show() !!}

                    <button type="submit" class="btn btn-primary">Create</button>

                </form>

            </div>
        </div>
    </div>
</div>