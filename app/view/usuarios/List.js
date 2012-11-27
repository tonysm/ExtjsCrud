Ext.define('CrudTest.view.usuarios.List', {
	extend: 'Ext.grid.Panel',
	alias: 'widget.usuarioslist',

	title: 'Listagem de usuários',

	store: 'Usuarios',

	initComponent: function() {

		this.columns = [
			{header: 'Nome', dataIndex: 'nome', flex: 1},
			{header: 'E-mail', dataIndex: 'email', flex: 1}
		];

		this.callParent(arguments);
	}
});