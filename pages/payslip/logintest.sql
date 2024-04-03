CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `password`, `type`, `department`) VALUES
(1, 'admin', 'admin', 'administrator', ' '),
(2, 'encoder', 'encoder', 'encoder', ' '),
(3, 'staff', 'staff', 'staff' , 'it');


--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;







