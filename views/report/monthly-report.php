<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Relatório de vendas por mês</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="POST">
<div class="box-body">
	<div class="form-group">
		<label>Selecione mês e ano:</label>
		<div class="input-group date">
		  <div class="input-group-addon">
		    <i class="fa fa-calendar"></i>
		  </div>
		  <input type="text" class="form-control pull-right report-month" id="datepickerMonth" data-type="monthlyReport">
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
	   	<div class="info-box bg-aqua">
	        <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>
	        <div class="info-box-content">
	            <span class="info-box-text">TOTAL DE VENDAS</span>
	            <span class="info-box-number TotalMoneySales">0.00</span>
	            <div class="progress">
	                <div style="width: 100%" class="progress-bar"></div>
	            </div>
	            <span class="progress-description TotalSales">
	                0 Vendas                                    
	            </span>
	        </div>
	    </div>
	</div> 
	<div class="col-md-3 col-sm-6 col-xs-12">
	    <div class="info-box bg-yellow">
	        <span class="info-box-icon"><i class="fa fa-plus"></i></span>
	        <div class="info-box-content">
	            <span class="info-box-text">TOTAL DE COMPRAS</span>
	            <span class="info-box-number TotalMoneyPurchases">0.00</span>
	            <div class="progress">
	                <div style="width: 100%" class="progress-bar"></div>
	            </div>
	            <span class="progress-description TotalPurchases">
	                0 Compras                                       
	            </span>
	        </div>
	    </div>
	</div>  
	<div class="col-md-3 col-sm-6 col-xs-12">
	    <div class="info-box bg-red">
	        <span class="info-box-icon"><i class="fa fa-circle-o"></i></span>
	        <div class="info-box-content">
	            <span class="info-box-text">TOTAL DE DESPESAS</span>
	            <span class="info-box-number TotalMoneyExpenses">0.00</span>
	            <div class="progress">
	                <div style="width: 100%" class="progress-bar"></div>
	            </div>
	            <span class="progress-description TotalExpenses">
	                0 Despesas                                        
	            </span>
	        </div>
	    </div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box bg-green">
		    <span class="info-box-icon"><i class="fa fa-dollar"></i></span>
		    <div class="info-box-content">
		        <span class="info-box-text">LUCROS</span>
		        <span class="info-box-number TotalMoneyProfit">0.00</span>
		        <div class="progress">
		            <div style="width: 100%" class="progress-bar"></div>
		        </div>
		        <span class="progress-description">
		           <i class="fa fa-info-circle" title="O cálculo dos lucros é feito em cima dos produtos vendidos."></i>                                       
		        </span>
		    </div>
		</div>
		</div>	
	</div>
  <!-- /.box-body -->
</form>
</div>