@extends('frontend.master')

@section('title')
Start Project | Digital Service Agency
@endsection

@section('content')
<style>
    @media (min-width: 577px) and (max-width: 767px) {
        
        .main-menu-area {
            width: 100% !important;
            padding-left: -28px !important;
            z-index: 999999;
            padding-top: 30px !important;
            padding-right: 91px !important;
        }
    }

    .main-menu-area {
        background-color: #30398d !important;
    }

    .main-menu-area .start-btn-area a.project-btn {
        padding: 10px 20px !important;
    }

    h1 span {
        color: #30398d !important;
    }

    #full-body #form-container form fieldset h6 {
        color: #30398d !important;
    }

    #full-body #form-container form button {
        background-color: #30398d !important;
    }

    #full-body #form-container form button:hover {
        background-color: #ffb545 !important;
    }
</style>

<div class="" ng-view="">

    <div id="full-body" class="section ng-scope">
        <div class="page-title">
            <h1>Let's create <span>something great</span> together.</h1>
        </div>

        <div id="form-container">
            <form action="{{url('submit-project')}}" method="POST">
                @csrf
                <div class="field">
                    <p>All fields are required unless indicated.</p>
                </div>
                @if(session('success'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> {{session('success')}}.
                </div>
                @endif

                <div id="message"></div>

                <fieldset>
                    <input type="hidden" name="" value="">
                    <div class="field">
                        <input type="text" id="name" name="name" placeholder="Your Name">
                    </div>

                    <div class="field">
                        <input type="email" id="email" name="email" placeholder="Email Address">
                    </div>

                    <div class="field">
                        <input type="tel" id="phone" name="phone" placeholder="Phone">
                    </div>

                    <div class="field">
                        <input type="text" id="company" name="company" placeholder="Company / Organisation Name">
                    </div>
                </fieldset>

                <fieldset class="text-center">
                    <div class="project-type">
                        <h6>Type of project</h6>
                        <p>Select all that apply</p>

                        <div class="field clearfix">
                            <div>
                                <input type="radio" value="Website" name="project_type" id="type-website">
                                <label for="type-website">Website</label>
                            </div>
                            <div>
                                <input type="radio" value="Mobile / App" name="project_type" id="type-mobile">
                                <label for="type-mobile">Mobile Apps</label>
                            </div>
                            <div>
                                <input type="radio" value="eCommerce" name="project_type" id="type-ecommerce">
                                <label for="type-ecommerce">eCommerce</label>
                            </div>
                            <div>
                                <input type="radio" value="Photography" name="project_type" id="type-photography">
                                <label for="type-photography">Photography</label>
                            </div>
                            <div>
                                <input type="radio" value="Video" name="project_type" id="type-video">
                                <label for="type-video">Video</label>
                            </div>
                            <div>
                                <input type="radio" value="Virtual Tours" name="project_type" id="type-virtual-tours">
                                <label for="type-virtual-tours">Virtual Tours</label>
                            </div>
                        </div>
                    </div><!-- END .project_type -->

                    <h6>Budget</h6>
                    <p>A transparent budget will help us ensure expectations are met. Ballparks are fine.</p>
                    <input type="number" name="budget" value="">

                    <div class="">
                        <h6>About the project</h6>
                        <p>Describe the project, requirements and objectives.</p>
                        <textarea id="about_project" name="about_project"></textarea>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="field">
                        <input type="text" id="hear_about" name="hear_about" placeholder="How did you hear about us?">
                    </div>

                    <div class="field">
                        <div class="loading"></div>
                        <button id="submit" class="btn ladda-button" data-color="purple" data-style="contract" type="Submit">Submit</button>
                    </div>

                </fieldset>
            </form>
        </div><!-- END #form-container -->
    </div><!-- END #full-body -->

    <script type="text/javascript" class="ng-scope">
        $('.noUiSlider').noUiSlider({
            range: [50, 500],
            start: [150, 250],
            connect: true,
            behaviour: 'tap-drag',
            step: 50,
            slide: function() {
                $("input.range").val('');
                var values = $(this).val();
                $("input.range").val("BDT " + values[0] + ",000 - BDT " + values[1] + ",000");
                if (values[1] == '500') {
                    $("input.range").val("BDT " + values[0] + ",000 - BDT " + values[1] + ",000 +");
                }
            },
            behaviour: 'extend-tap',
            serialization: {
                to: [
                    [$('.value-one')],
                    [$('.value-two')]
                ],
                resolution: 1
            }
        });
    </script>

    <script type="text/javascript" class="ng-scope">
        jQuery(document).ready(function() {

            $('#start-project-form').submit(function() {

                var action = $(this).attr('action');

                $("#message").slideUp(400, function() {
                    $('#message').hide();

                    $('#submit').attr('disabled', 'disabled');

                    $.post(action, {
                            name: $('#name').val(),
                            email: $('#email').val(),
                            phone: $('#phone').val(),
                            company: $('#company').val(),
                            // project_type: $('input[name=project_type]').val(),
                            project_type: $('input[name=project_type]:checked').map(function() {
                                return this.value;
                            }).get().join(','),
                            pp_budget: $('#pp-budget').val(),
                            about_project: $('#about_project').val(),
                            hear_about: $('#hear_about').val()
                        },
                        function(data) {
                            document.getElementById('message').innerHTML = data;
                            $('#message').slideDown('slow');

                            $('html,body').animate({
                                scrollTop: $("#message").offset().top - 100
                            }, 'slow');

                            $('#start-project-form img.loader').fadeOut('slow', function() {
                                $(this).remove()
                            });
                            $('#submit').removeAttr('disabled');
                            // if(data.match('success') != null) $('#start-project-form').slideUp('slow');
                            if (data.match('success') != null) $('#start-project-form').trigger("reset");
                        }
                    );

                });

                return false;

            });

        });
    </script>

    <script class="ng-scope">
        $(function() {
            $myMobileNav = $("#myMobileNav");
            $myMobileNav.slideUp(50);
        });
    </script>
</div>
@endsection