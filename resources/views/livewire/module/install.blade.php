<div>
    <div class="col-lg-12" style="padding-bottom: 20px;">
        @include('utils.alerts')
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0"><i class="bi bi-box" style="font-size: 15px;"></i> {{ __('Applications') }}</h3>
            </div>
            <div class="card-body">
                    <div class="row">

                        @foreach(modules() as $module)
                        <div class="col-lg-6" style="padding-bottom: 10px">
                            <div class="card">
                              <div class="row g-0">
                                <div class="col-auto">
                                  <div class="card-body">
                                    <div class="avatar avatar-md" style="background-image: url(./static/jobs/job-7.png)"></div>
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="card-body ps-0">
                                    <div class="row">
                                      <div class="col">
                                        <h3 class="mb-0">{{ $module->name }}</h3>
                                      </div>
                                      <div class="col-auto fs-3 text-green">
                                            <form method="POST" action="{{ route('module.install', $module) }}">
                                                @csrf
                                                {{-- <button class="btn btn-primary" type="submit">{{ __('Installer') }}</button> --}}
                                                <input type="checkbox" class="btn btn-primary" value="Installer">
                                            </form>
                                     </div>
                                    </div>

                                    <div class="row">

                                      <div class="col-md">
                                        <div class="mt-3 list-inline list-inline-dots mb-0 text-muted d-sm-block d-none">
                                            <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" /><line x1="13" y1="7" x2="13" y2="7.01" /><line x1="17" y1="7" x2="17" y2="7.01" /><line x1="17" y1="11" x2="17" y2="11.01" /><line x1="17" y1="15" x2="17" y2="15.01" /></svg>
                                                Par <strong>Koverae SA</strong>
                                            </div>
                                            <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                {{ $module->description }}
                                            </div>
                                        </div>
                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

            </div>
        </div>
    </div>
</div>
