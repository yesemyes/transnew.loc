{literal}
var messages= {};
messages["main[filed_car_brand]"]                   ={required:'{/literal}{Trans param='filed_car_brand_required'}{literal}'};
messages["main[filed_car_brand_model]"]             ={required:'{/literal}{Trans param='filed_car_brand_model_required'}{literal}';
messages["main[filed_modification]"]                ={required:'{/literal}{Trans param='filed_modification_required'}{literal}'};
messages["main[filed_bargaining]"]               	 ={required:'{/literal}{Trans param='filed_bargaining_required'}{literal}'};

messages["main[filed_engine]"]                      ={
													  required:{literal}'{Trans param='filed_bargaining_required'}'{/literal},
													  number: {literal}'{Trans param='filed_bargaining_number')'{/literal},
                                                      maxlength:{literal}'{$this->trans('filed_bargaining_maxValue')'{/literal}
                                                      };
                                                      
messages["main[filed_body]"]                		 ={required:{literal}'{$this->trans('filed_bargaining_filed_body'}'{/literal}};
messages["main[filed_drive]"]                		 ={required:{literal}'{Trans param='filed_drive_body_required'}'{/literal}};
messages["main[filed_rudder]"]                		 ={required:{literal}'{Trans param='filed_rudder_required'}'{/literal}};
messages["main[filed_warranty]"]                	 ={required:{literal}'{Trans param='filed_warranty_required'}'{/literal}};
messages["main[filed_release_date_year]"]           ={required:{literal}'{Trans param='filed_release_date_year_required'}'{/literal}};
messages["main[filed_release_date_month]"]          ={required:{literal}'{Trans param='filed_release_date_month_required'}'{/literal}};

messages["main[filed_duration]"]           		   = {required:{literal}'{Trans param='filed_duration_required'}'{/literal}};


messages["main[filed_milage]"]                		 ={
													     required:{literal}'{Trans param='filed_milage_required'}'{/literal},
                                                         max:{literal}'{Trans param='filed_milage_maxValue'}'{/literal}
                                                         };
messages["main[filed_state]"]                       ={ required:{literal}'{Trans param='filed_state'}'{/literal}};
messages["main[filed_price]"]                       ={required:{literal}'{Trans param='filed_price'}'{/literal}};
messages["main[filed_currency]"]                    ={required:{literal}'{Trans param='filed_currency'}'{/literal}};
messages["main[filed_color]"]                       ={required:{literal}'{Trans param='filed_color'}'{/literal}};

messages["main[filed_customs]"]                     ={required:{literal}'{Trans param='filed_customs'}'{/literal}};
messages["main[user_phone1_code]"]                  ={
													  digits: {literal}'{Trans param='user_phone1_code'}'{/literal},
													  maxlength:{literal}'{Trans param='user_phone1_code_maxlength'}'{/literal}
                                                      };
messages["main[user_phone2_code]"]                  ={digits: {literal}'{Trans param='user_phone1_code'}'{/literal},
													  maxlength:{literal}'{Trans param='user_phone1_code_maxlength'}'{/literal}};
messages["main[user_phone1]"]                		 ={digits: {literal}'{Trans param='user_phone1_code'}'{/literal},
													  maxlength:{literal}'{Trans param='user_phone1_code_maxlength'}'{/literal}};
messages["main[user_phone2]"]                		 ={
													 digits: {literal}'{Trans param='user_phone1_code'}'{/literal},
													  maxlength:{literal}'{Trans param='user_phone1_code_maxlength'}'{/literal}
                                                      };
{/literal}