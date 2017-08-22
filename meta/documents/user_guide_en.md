
# Shopping24.de plugin user guide

<div class="container-toc"></div>

## 1 Registering with Shopping24.de

shopping24.de is a subsidiary of the Otto Group and an online portal for price and product comparisons. Please note that this website is currently only available in German.

## 2 Setting up the data format Shopping24DE-Plugin in plentymarkets

The plugin Elastic Export is required to use this format.

Refer to the [Exporting data formats for price search engines](https://knowledge.plentymarkets.com/en/basics/data-exchange/exporting-data#30) page of the manual for further details about the individual format settings.

The following table lists details for settings, format settings and recommended item filters for the format **Shopping24DE-Plugin**.
<table>
    <tr>
        <th>
            Settings
        </th>
        <th>
            Explanation
        </th>
    </tr>
    <tr>
        <td class="th" colspan="2">
            Settings
        </td>
    </tr>
    <tr>
        <td>
            Format
        </td>
        <td>
            Choose <b>Shopping24DE-Plugin</b>.
        </td>        
    </tr>
    <tr>
        <td>
            Provisioning
        </td>
        <td>
            Choose <b>URL</b>.
        </td>        
    </tr>
    <tr>
        <td>
            File name
        </td>
        <td>
            The file name must have the ending <b>.csv</b> or <b>.txt</b> for Twenga.com to be able to import the file successfully.
        </td>        
    </tr>
    <tr>
        <td class="th" colspan="2">
            Item filter
        </td>
    </tr>
    <tr>
        <td>
            Active
        </td>
        <td>
            Choose <b>active</b>.
        </td>        
    </tr>
    <tr>
        <td>
            Markets
        </td>
        <td>
            Choose one or multiple order referrers. The chosen order referrer has to be active at the variation for the item to be exported.
        </td>        
    </tr>
    <tr>
        <td class="th" colspan="2">
            Format settings
        </td>
    </tr>
    <tr>
        <td>
            Order referrer
        </td>
        <td>
            Choose the order referrer that should be assigned during the order import.
        </td>        
    </tr>
    <tr>
        <td>
            Preview text
        </td>
        <td>
            This option is not relevant for this format.
        </td>        
    </tr>
    <tr>
        <td>
            Offer price
        </td>
        <td>
            This option is not relevant for this format.
        </td>        
    </tr>
    <tr>
        <td>
            VAT note
        </td>
        <td>
            This option is not relevant for this format.
        </td>        
    </tr>
</table>

## 3 Overview of available columns

<table>
    <tr>
        <th>
			Column name
		</th>
		<th>
			Explanation
		</th>
    </tr>
    <tr>
		<td>
			art_name
		</td>
		<td>
			<b>Content:</b> According to the format setting <b>item name</b>.
		</td>        
	</tr>
	<tr>
		<td>
			long_description
		</td>
		<td>
			<b>Content:</b> According to the format setting <b>Description</b>.
		</td>        
	</tr>
	<tr>
		<td>
			image_url
		</td>
		<td>
			<b>Content:</b> The image url. Variation images are prioritizied over item images.
		</td>        
	</tr>
    <tr>
		<td>
			deep_link
		</td>
		<td>
			<b>Content:</b> The <b>URL path</b> of the item depending on the chosen <b>client</b> in the format. settings.
		</td>        
	</tr>
	<tr>
		<td>
			price
		</td>
		<td>
			<b>Content:</b> The <b>sales price</b> of the variation.
		</td>        
	</tr>
	<tr>
		<td>
			old_price
		</td>
		<td>
			<b>Content:</b> If the <b>RRP</b> is activated in the format setting and is higher than the <b>sales price</b>, the <b>RRP</b> will be exported.
		</td>        
	</tr>
	<tr>
		<td>
			currency
		</td>
		<td>
			<b>Content:</b> The ISO3 <b>currency code</b> of the price.
		</td>        
	</tr>
	<tr>
		<td>
			delivery_costs
		</td>
		<td>
			<b>Content:</b> According to the format setting <b>shipping costs</b>.
		</td>        
	</tr>
	<tr>
		<td>
			category
		</td>
		<td>
			<b>Content:</b> The name of the <b>category</b>.
		</td>        
	</tr>
	<tr>
		<td>
			brand
		</td>
		<td>
			<b>Content:</b> The <b>name of the manufacturer</b> of the item. The <b>external name</b> from the menu <b>Settings » Items » Manufacturer</b> will be preferred if existing.
		</td>        
	</tr>
    <tr>
        <td>
            gender_age
        </td>
        <td>
            <b>Content:</b> The <b>Interessengruppe</b> of the item.
        </td>        
    </tr>
    <tr>
		<td>
			ean
		</td>
		<td>
			<b>Content:</b> According to the format setting <b>Barcode</b>.
		</td>        
	</tr>
	<tr>
		<td>
			keywords
		</td>
		<td>
			<b>Content:</b> The <b>Keywords</b> of the item.
		</td>        
	</tr>
    <tr>
		<td>
			art_number
		</td>
		<td>
			<b>Content:</b> The <b>variation number</b> of the variation.
		</td>        
	</tr>
	<tr>
		<td>
			color
		</td>
		<td>
			<b>Content:</b> The value of an attribute with an attribute link for <b>Amazon</b> to <b>Color</b>.
		</td>        
	</tr>
	<tr>
		<td>
			clothing_size
		</td>
		<td>
			<b>Content:</b> The value of an attribute with an attribute link for <b>Amazon</b> to <b>Size</b>.
		</td>        
	</tr>
	<tr>
		<td>
			cut
		</td>
		<td>
			<b>Content:</b> Empty.
		</td>        
	</tr>
	<tr>
		<td>
			link
		</td>
		<td>
			<b>Content:</b> Empty.
		</td>        
	</tr>
	<tr>
		<td>
			unit_price
		</td>
		<td>
			<b>Content:</b> The <b>base price information</b>. The format is "price / unit". (Example: 10,00 EUR / kilogram)
		</td>        
	</tr>
</table>

## License

This project is licensed under the GNU AFFERO GENERAL PUBLIC LICENSE.- find further information in the [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-shopping-24-de/blob/master/LICENSE.md).
