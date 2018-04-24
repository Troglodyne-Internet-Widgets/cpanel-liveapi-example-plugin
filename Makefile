all: install

install:
	mkdir -p /usr/local/cpanel/base/frontend/paper_lantern/qa_cpanel_liveapi_demonstrator
	cp -r  ./qa_cpanel_liveapi_demonstrator /usr/local/cpanel/base/frontend/paper_lantern/
	mkdir ./tmp
	cd ./tmp
	tar -cvzf qa_doinitlive_api.tar.gz ../qa_doinitlive_api
	cd ../
	/usr/local/cpanel/scripts/install_plugin ./tmp/qa_doinitlive_api.tar.gz

uninstall:
	[ -d /usr/local/cpanel/base/frontend/paper_lantern/qa_cpanel_liveapi_demonstrator ] && rm -rf /usr/local/cpanel/base/frontend/paper_lantern/qa_cpanel_liveapi_demonstrator
