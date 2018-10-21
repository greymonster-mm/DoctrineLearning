#!/bin/bash
EXECPATH=`dirname $0`
cd $EXECPATH
cd ..

rm build -Rf
sphinx-build en build

sphinx-build -b html en build/pdf
rubber --into build/html --html build/pdf/Doctrine2ORM.tex
