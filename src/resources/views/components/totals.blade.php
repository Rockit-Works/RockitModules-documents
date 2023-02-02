<table>
	<tr>
		<td style="text-align: right">Totaal exclusief</td>
		<td style="text-align: right">&euro;{{number_format($totals['excl'],2,',','.')}}</td>
	</tr>
	<tr>
		<td style="text-align: right">BTW</td>
		<td style="text-align: right">&euro;{{number_format($totals['vat'],2,',','.')}}</td>
	</tr>
	<tr>
		<td style="text-align: right">Totaal inclusief</td>
		<td style="text-align: right">&euro;{{number_format($totals['incl'],2,',','.')}}</td>
	</tr>
</table>