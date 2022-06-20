<div class="container">
    <div class="row">

        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
        @endif
        <div class="col-md-12">
            <div>
                <h3>My Experience</h3>

            </div>

            <div class="tabbable-panel">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs ">
                        <li class="active">
                            <a href="#work_history" data-toggle="tab" wire:ignore>Work History </a>
                        </li>
                        <li>
                            <a href="#education" data-toggle="tab" wire:ignore>Education </a>
                        </li>
                        <li>
                            <a href="#skill" data-toggle="tab" wire:ignore>Skills </a>
                        </li>
                        <li>
                            <a href="#language" data-toggle="tab" wire:ignore>Languages </a>
                        </li>
                        <li>
                            <a href="#activity" data-toggle="tab" wire:ignore>Activities </a>
                        </li>
                        <li>
                            <a href="#certification" data-toggle="tab" wire:ignore>Certifications </a>
                        </li>
                        <li>
                            <a href="#work_preference" data-toggle="tab" wire:ignore>Work Preferences </a>
                        </li>
                        <li>
                            <a href="#reference" data-toggle="tab" wire:ignore>References </a>
                        </li>
                        <li>
                            <a href="#resume" data-toggle="tab" wire:ignore>Resume </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="work_history" wire:ignore.self>
                            @include('livewire.user.user-work-history-component')
                        </div>
                        <div class="tab-pane" id="education" wire:ignore.self>
                            @include('livewire.user.user-education-component')
                        </div>
                        <div class="tab-pane" id="skill" wire:ignore.self>
                            @include('livewire.user.user-skill-component')
                        </div>
                        <div class="tab-pane" id="language" wire:ignore.self>
                            @include('livewire.user.user-language-component')
                        </div>
                        <div class="tab-pane" id="activity" wire:ignore.self>
                            @include('livewire.user.user-activity-component')
                        </div>
                        <div class="tab-pane" id="certification" wire:ignore.self>
                            @include('livewire.user.user-certification-component')
                        </div>
                        <div class="tab-pane" id="work_preference" wire:ignore.self>
                            @include('livewire.user.user-work-preference-component')
                        </div>
                        <div class="tab-pane" id="reference" wire:ignore.self>
                            @include('livewire.user.user-reference-component')
                        </div>
                        <div class="tab-pane" id="resume" wire:ignore.self>
                            @include('livewire.user.user-resume-component')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
