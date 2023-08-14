<div>
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-12">
            <div class="card-body">
              <h5 class="card-title text-primary">Hi @auth
                  {{ auth()->user()->name}}
                @endauth </h5>

              <div class="row">
                <div class="col-md-12 order-0 mb-5">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2 mb-5">Clients Statistics</h5>
                      </div>


                    </div>
                    <div class="card-body">

                      <div class="row mb-5">
                        <div class="col card me-2">
                          <div class="d-flex justify-content-between align-items-center m-3">
                            <div class="d-flex flex-column align-items-center gap-1">
                              <h2 class="mb-2">{{$totalClients}}</h2>
                              <span class="text-center">Total Clients</span>
                            </div>


                          </div>
                        </div>
                        <div class="col card me-2">
                          <div class="d-flex justify-content-between align-items-center m-3">
                            <div class="d-flex flex-column align-items-center gap-1">
                              <h2 class="mb-2">{{$totalClientsThisMonth}}</h2>
                              <span class="text-center">Total Clients Started This Month</span>
                            </div>


                          </div>
                        </div>
                        @can('view payment records')
                        <div class="col card me-2">
                          <div class="d-flex justify-content-between align-items-center m-3">
                            <div class="d-flex flex-column align-items-center gap-1">
                              <h2 class="mb-2">{{$numberOfPaymentsThisMonth}}</h2>
                              <span class="text-center">Number of Payments This Month</span>
                            </div>


                          </div>
                        </div>
                        <div class="col card me-2">
                          <div class="d-flex justify-content-between align-items-center m-3">
                            <div class="d-flex flex-column align-items-center gap-1">
                              <h2 class="mb-2">${{$totalPaymentAmountThisMonth}}</h2>
                              <span class="text-center">Total Payments Amount This Month</span>
                            </div>


                          </div>
                        </div>
                        @endcan

                      </div>

                      @livewire('payment.all')

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
