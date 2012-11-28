// ativando carregamento de arquivos on-demand
Ext.Loader.setConfig({
	enabled: true
});
// configurando aplicação
Ext.application({
	name: 'CrudTest',
	appFolder: 'app',
	requires: [
		'Ext.container.Viewport'
	],
	controllers: ['Usuarios'],
	launch: function() {
		Ext.create('Ext.container.Viewport', {
			layout: 'fit',
			items: [
				{
					xtype: 'usuarioslist'
				}
			]
		});
	}
});