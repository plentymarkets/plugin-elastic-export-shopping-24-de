
# Shopping24.de plugin user guide

<div class="container-toc"></div>

## 1 Registering with Shopping24.de

shopping24.de is a subsidiary of the Otto Group and an online portal for price and product comparisons. Please note that this website is currently only available in German. 

## 2 Setting up the data format Shopping24DE-Plugin in plentymarkets

By installing this plugin yo will receive the export format <b>Shopping24DE-Plugin</b>. Use this format to exchange data between plentymarkets and Shopping24.de. It is required to install the Plugin Elastic export from the plentyMarketplace first before you can use the format <b>Shopping24DE-Plugin</b> in plentymarkets.

Once both plugins are installed, you can create the export format <b>Shopping24DE-Plugin</b>. Refer to the [Exporting data formats for price search engines](https://knowledge.plentymarkets.com/en/basics/data-exchange/exporting-data#30) page of the manual for further details about the individual format settings.

Creating a new export format:

1. Go to <b>Data » Elastic export</b>.
2. Click on <b>New export</b>.
3. Carry out the settings as desired. Pay attention to the information given in table 1.
4. <b>Save</b> the settings.
→ The export format will be given an ID and it will appear in the overview within the <b>Exports</b> tab.


The following table lists details for settings, format settings and recommended item filters for the format **Shopping24DE-Plugin**.

| **Settings**   |      **Explanation**| 
|----------|-------------|
| Name | Enter a name. The export format will be listed under this name in the overview within the Exports tab. |
| Typ | Select the type <b>Item</b> from the drop-down menu. |
| Format | Select <b>Shopping24DE-Plugin</b>. |
| Limit | Enter a number. If you want to transfer more than 9,999 data records to the price search engine, then the output file will not be generated again for another 24 hours. This is to save resources. If more than 9,999 data records are necessary, the setting **Generate cache file** has to be active. |
| Generate cache file | Place a check mark if you want to transfer more than 9,999 data records to the price search engine. The output file will not be generated again for another 24 hours. We recommend not to activate this setting for more than 20 export formats. This is to save resources. |
| Provisioning | Select <b>URL</b> wählen. This option generates a token for authentication in order to allow external access. |
| Token, URL | If you selected the option **URL** under **Provisioning**, then click on **Generate token**. The token will be entered automatically. The URL will be entered automatically if the token was generated under **Token**. |
| File name | The file name must have the ending <b>.csv</b> or <b>.txt</b> for Shopping24.de to be able to import the file successfully. |
| Add item filters | Select an item filter from the drop-down menu and click on **Add**. There are no filters set in default. It is possible to add multiple item filters from the drop-down menu one after the other. **Variations** = Select **Transfer all** or **Only transfer main variations**. **Markets** = Select one market, several or **ALL**. The availability for all markets selected here has to be saved for the item. Otherwise, the export will not take place. **Currency** = Select a currency. **Category** = Activate to transfer the item with its category link. Only items belonging to this category will be exported. **Image** = Activate to transfer the item with its image. Only items with images will be transferred. **Client** = Select client. **Stock** = Select which stocks you want to export. **Flag 1 - 2** = Select the flag. **Manufacturer** = Select one, several or **ALL** manufacturers. **Active** = Only active variations will be exported. |
| Product URL | Chose wich URL should be transferred to the price comparison portal, the item’s URL or the variation’s URL. Variation SKUs can only be transferred in combination with the Ceres store. |
| Client | Select a client. This setting is used for the URL structure. |
| URL parameter | Enter a suffix for the product URL if this is required for the export. If you activated the transfer option for the product URL further up, then this character string will be added to the product URL. |
| Order referrer | Choose the order referrer that should be assigned during the order import. |
| Market account | Select the market account from the drop-down menu. The selected referrer will be added to the product URL so that sales can be analysed later. |
| Language | Select the language from the drop-down menu. |
| Item name | Select **Name 1**, **Name 2** or **Name 3**. These names are saved in the **Texts** tab of the item. Enter a number into the **Maximum number of characters (def. Text)** field if desired. This will specify how many characters should be exported for the item name. |
| Preview text | This option is not relevant for this format. |
| Description | Select the text that you want to transfer as description. Enter a number into the **Maximum number of characters (def. text)** field if desired. This will specify how many characters should be exported for the description. Activate the option **Remove HTML tags** if you want HTML tags to be removed during the export. If you only want to allow specific HTML tags to be exported, then enter these tags into the field **Permitted HTML tags, separated by comma (def. Text)**. Use commas to separate multiple tags. |
| Target country | Select the target country from the drop-down menu. |
|Barcode | Select the ASIN, ISBN or an EAN from the drop-down menu. The barcode has to be linked to the order referrer selected above. If the barcode is not linked to the order referrer it will not be exported. |
| Image | Select **Position 0** or **First image** to export this image. **Position 0** = An image with position 0 will be transferred. **First image** = The first image will be transferred. |
| Image of the energy efficiency label | Enter the position. Every image that should be transferred as an energy efficiency label must have this position. |
| Offer price | This option is not relevant for this format. |
| RRP | Activate to transfer the RRP. |
| Shipping costs | Activate this option if you want to use the shipping costs that are saved in a configuration. If this option is activated, then you will be able to select the configuration and the payment method from the drop-down menus. Activate the option **Transfer flat rate shipping charge** if you want to use a fixed shipping charge. If this option is activated, a value has to be entered in the line underneath. |
| VAT note | This option is not relevant for this format. |
| Item availability | Activate the **overwrite** option and enter item availabilities into the fields 1 to 10. The fields represent the IDs of the availabilities. This will overwrite the item availabilities that are saved in the menu **System » Item » Availability**. |
       
_Tab. 1: Settings for the data format **Shopping24DE-Plugin**_       


## 3 Available columns for the export file 

Go to <b>Data » Elastic export</b> and open the data format <b>Shopping24DE-Plugin</b> in order to download the export file. 

| **Column**   |      **Explanation**| 
|----------|-------------|
| art_name | According to the format setting <b>item name</b>. |
| long_description | According to the format setting <b>Description</b>. |
| mage_url | The image URL. Variation images are prioritizied over item images. |
| deep_link | The <b>URL path</b> of the item depending on the chosen <b>client</b> in the format. settings. |
| price | The <b>sales price</b> of the variation. |
| old_price | If the <b>RRP</b> is activated in the format setting and is higher than the <b>sales price</b>, the <b>RRP</b> will be exported. |
| currency | The ISO3 <b>currency code</b> of the price. |
| delivery_costs | According to the format setting <b>shipping costs</b>. |
| category | The name of the <b>category</b>. |
| brand | The <b>name of the manufacturer</b> of the item. The <b>external name</b> from the menu <b>Settings » Items » Manufacturer</b> will be preferred if existing. |
| gender_age | The <b>potential group of buyers</b> of the item. |
| ean | According to the format setting <b>Barcode</b>. |
| keywords | The <b>variation number</b> of the variation. |
| art_number | Die <b>Variantennummer</b> der Variante. |
| color | The value of an attribute with an attribute link for <b>Amazon</b> to <b>Color</b>. |
| clothing_size | The value of an attribute with an attribute link for <b>Amazon</b> to <b>Size</b>. |
| cut | Empty |
| link | Empty |
| unit_price | The <b>base price information</b>. The format is "price / unit". Example: 10,00 EUR / kilogram. |
		
_Tab. 2: Export file for **Shopping24.de**_

## License

This project is licensed under the GNU AFFERO GENERAL PUBLIC LICENSE.- find further information in the [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-shopping-24-de/blob/master/LICENSE.md).
