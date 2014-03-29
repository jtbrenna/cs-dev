
<!-- RIGHT HAND NAVIGATION BOX INCLUDE -->
<?php
include('http://www.uvm.edu/~cems/cs/newsevents/_newseventssuppnav.html');
?>
<style type="text/css">
<!--
span.SpellE {mso-style-name:"";
	mso-spl-e:yes;}
-->
</style>


<h3>Seminar Description</h3>

<h4 class="subtitle">&quot;<strong>CoJava: Optimization Modeling by Nondeterministic Simulation</strong>&quot;</h4>
</p>

<p>
<a href="http://ise.gmu.edu/~brodsky/"><strong>Dr. Alex Brodsky
</strong></a><br />
Department of Information and Software Engineering<br />
George Mason University</p>

<p>
  <strong>October 9, 2006</strong><br />
12:20 - 1:10 pm<br />
367 Votey</p>

<p><strong>Summary</strong>
<br />
We have proposed and implemented the language CoJava, which offers both the advantages of simulation-like process modeling in Java, and the capabilities of true decision optimization. By design, the syntax of CoJava is identical to the programming language Java, extended with special constructs to (1) make a nondeterministic choice of a numeric value, (2) assert a constraint, and (3) designate a program variable as the objective to be optimized. A sequence of specific selections in nondeterministic choice statements corresponds to an execution path. We define an optimal execution path as one that (1) satisfies the range conditions in the choice statements, (2) satisfies the assert-constraint statements, and (3) produces the optimal value in a designated program variable, among all execution paths that satisfy (1) and (2). The semantics of a CoJava program amounts to first finding an optimal execution path, and then procedurally executing it. To find an optimal execution path, the implemented CoJava compiler reduces the problem to a standard optimization formulation, and then solves it on an external solver. Then, the CoJava program is run as a Java program, where the choice statements select the found optimal values, and the assert and optimization statements are ignored. We illustrate the usage and semantics of CoJava using a simple supply-chain example, in which elastic demand, a manufacturer and a supplier are modeled as Java classes.</p>
<p><br />
<span class="return"><a href="../../?Page=default.php">CS homepage</a></span> | <span class="return"><a href="../../?Page=newsevents/seminars.php">Seminars page</a></span> </p>
